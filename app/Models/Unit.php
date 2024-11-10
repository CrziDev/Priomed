<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public static function getOptionsNameArray($html = false): array
    {
        //Display
        $items = self::all();

        //Column + index
        if (!$html) return $items->mapWithKeys(fn($item) => [$item->id => $item->name])->all();

        return $items->mapWithKeys(fn($item) => [$item->id =>
        '<small><strong>Name</strong> ' . $item->name . '</small>'])->all();
    }
}
