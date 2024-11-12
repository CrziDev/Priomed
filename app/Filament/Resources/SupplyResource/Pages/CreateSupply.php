<?php

namespace App\Filament\Resources\SupplyResource\Pages;

use App\Filament\Resources\SupplyResource;
use App\Models\Branches;
use App\Models\Stock;
use App\Models\StockSupply;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateSupply extends CreateRecord
{
    protected static string $resource = SupplyResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $model = static::getModel()::create($data);

        
        $branches = Branches::all();

        foreach($branches as $branch){
            $stock = Stock::create([
                'branch_id' => $branch->id,
            ]);

            StockSupply::create([
                'stock_id' => $stock->id,
                'supply_id' => $model->id,
                'quantity' => 0,
            ]);
        }

        return $model;
    }
}
