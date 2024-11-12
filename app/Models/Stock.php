<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function branch(){
        return $this->belongsTo(Branches::class,'branch_id');
    }
    
    public function supplies(){
        return $this->hasMany(StockSupply::class,'stock_id');
    }
}
