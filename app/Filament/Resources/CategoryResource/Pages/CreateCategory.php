<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use App\Models\Branches;
use App\Models\Stock;
use App\Models\StockSupply;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

}
