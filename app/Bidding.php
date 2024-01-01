<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    protected $table = 'bidding';
    protected $guarded = [];
    public $timestamps = false;


    public function auctions(){
        return $this->belongsTo(Auction::class, 'auctionID');
    }
    public function user(){
        return $this->belongsTo(User::class, "userID");
    }

}
