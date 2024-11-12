<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockSupply extends Model
{
    public function supply(){
        return $this->belongsTo(Supply::class,'supply_id');
    }
}
