<?php

namespace App\Filament\Resources\PurchaseOrderResource\Pages;

use App\Enums\PurchaseOrdersEnum;
use App\Enums\RolesEnum;
use App\Filament\Resources\PurchaseOrderResource;
use App\Models\PurchaseOrder;
use Filament\Actions;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Collection;

class EditPurchaseOrder extends EditRecord
{
    protected static string $resource = PurchaseOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->submit(),
            $this->approve(),
        ];
    }

    public function submit(){
        return Action::make('submit')
            ->visible(fn($record)=>
                auth()->user()->hasRole([RolesEnum::ADMIN->value]) &&
                $record->status == PurchaseOrdersEnum::PENDING->value
            )
            ->action(function (PurchaseOrder $po){ 
                $po->submit();
                return $this->redirect(route('filament.admin.resources.purchase-orders.index'));
            })
            ->requiresConfirmation();
    }

    public function approve(){
        return Action::make('approve')
            ->visible(fn($record)=>
                    auth()->user()->hasRole([RolesEnum::ADMIN->value]) &&
                    $record->status == PurchaseOrdersEnum::SUBMITTED->value
                )
                ->action(function (PurchaseOrder $po){ 
                    $po->approve();
                    return $this->redirect(route('filament.admin.resources.purchase-orders.index'));
                })
            ->requiresConfirmation();

    }
}
