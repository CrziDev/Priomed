<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    use HasFactory;
    

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
