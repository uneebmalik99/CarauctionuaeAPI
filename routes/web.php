<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/home', [MessageController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Home
// Route::get('/home', [HomeController::class, 'index'])->name('home');

// Users
Route::get('/users', [UsersController::class, 'index']);
Route::get('/approve/{id}/{startLimit}/{endLimit}', [UsersController::class, 'approveUser']);
Route::get('/disapprove/{id}', [UsersController::class, 'disApproveUser']);
Route::get('/user/delete/{id}', [UsersController::class, 'deleteUser']);

// Counter
Route::view('/counter', 'couter');

// Auction
Route::post('/auction/store', [AuctionController::class, 'store']);
Route::get('/completed', [AuctionController::class, 'completed']);
Route::get('/auction', [AuctionController::class, 'index']);
Route::get('/auction/create', [AuctionController::class, 'create']);
Route::get('/auction/list', [AuctionController::class, 'list']);
Route::get('/auction/view/bidding/{id?}', [AuctionController::class, 'view_bidding']);
Route::get('/view-bidding-data/{id?}', [AuctionController::class, 'view_bidding_list']);
Route::get('/auction/purchased/{userID}/{auctionID}/{price}/{pricetax}', [AuctionController::class, 'purchased']);
Route::get('/auction/reauction/{auctionID}/{startdate}/{enddate}/{timezoneoffset}/{CustomerPrice}', [AuctionController::class, 'reauction']);

Route::get('/fetch-data', [AuctionController::class, 'fetch_data']);
// Demo
Route::get('/notification', [NotificationController::class, 'notification']);

// Invoice
Route::get('/invoice/approve/{auctionID}', [AuctionController::class, 'approveInvoice']);
Route::get('/invoice/disapprove/{auctionID}', [AuctionController::class, 'disapproveInvoice']);
Route::get('/invoice/changestatus/{auctionID}/{value}', [AuctionController::class, 'changeInvoiceStatus']);

});

require __DIR__.'/auth.php';
