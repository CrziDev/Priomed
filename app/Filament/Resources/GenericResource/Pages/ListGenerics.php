<?php

namespace App\Filament\Resources\GenericResource\Pages;

use App\Filament\Resources\GenericResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGenerics extends ListRecords
{
    protected static string $resource = GenericResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
