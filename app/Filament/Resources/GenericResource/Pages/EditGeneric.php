<?php

namespace App\Filament\Resources\GenericResource\Pages;

use App\Filament\Resources\GenericResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGeneric extends EditRecord
{
    protected static string $resource = GenericResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
