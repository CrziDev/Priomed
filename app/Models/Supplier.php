<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

     
    //___________ Functions ___________ //

    public static function getOptionsArray():array
    {
        $query = self::all();

        $result = $query->mapWithKeys(fn($items) => [$items->id=>
                            "<span><b>{$items->supplier_name}</b></spans>"
                        ])->toArray();
        return $result;
    }
    

}
