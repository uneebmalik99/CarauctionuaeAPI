<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\API\BiddingController;
use App\Http\Controllers\API\AuctionAPI;
use App\Http\Controllers\API\InvoiceController;
use App\Http\Controllers\API\PasswordAPIController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User
Route::middleware('auth:api')->get('/user', [UserController::class, 'getUser']);

// Authentication
Route::post('register', [RegisterController::class, 'APIregister']);
Route::post('authenticate', [LoginController::class, 'APIauthenticate']);
Route::post('logout', [LoginController::class, 'APIlogout']);

// Bidding
Route::post('postBid', [BiddingController::class, 'postBid']);
Route::get('getBids', [BiddingController::class, 'getBids']);
Route::get('getBid', [BiddingController::class, 'getBidOnAuction']);
Route::get('getAuction', [AuctionAPI::class, 'getAuction']);
Route::get('getUserPreviousBids', [BiddingController::class, 'getUserPreviousBids']);
Route::get('getUserLiveBids', [BiddingController::class, 'getUserLiveBids']);

// Auctions
Route::get('purchased', [AuctionAPI::class, 'purchased']);
Route::get('auction', [AuctionAPI::class, 'index']);
Route::get('wonbids', [AuctionAPI::class, 'wonbids']);

// Invoice
Route::get('saveInvoiceData', [InvoiceController::class, 'saveInvoiceData']);
Route::get('getInvoice', [InvoiceController::class, 'getInvoice']);
Route::post('saveInvoiceImage', [InvoiceController::class, 'saveInvoiceImage']);
Route::post('uploadinvoice', [InvoiceController::class, 'uploadinvoice']);

// Password
Route::get('resetPassword', [PasswordAPIController::class, 'resetPassword']);
Route::post('resetPasswordToken', [PasswordAPIController::class, 'resetPasswordToken']);