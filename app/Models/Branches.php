<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
     //___________ Functions ___________ //

     public static function getOptionsArray():array
     {
         $query = self::all();
 
         $result = $query->mapWithKeys(fn($items) => [$items->id=>
                             "<span><b>{$items->branch_name}</b></spans>"
                         ])->toArray();
         return $result;
     }
}
