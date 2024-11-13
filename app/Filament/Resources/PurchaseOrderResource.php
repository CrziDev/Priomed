<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PurchaseOrderResource\Pages;
use App\Filament\Resources\PurchaseOrderResource\RelationManagers;
use App\Models\Branches;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Purchase Order';
    protected static ?int $navigationGroupSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('supplier_id')
                    ->options(Supplier::getOptionsArray())
                    ->allowHtml()
                    ->searchable(),
                Forms\Components\Select::make('branch_id')
                    ->options(Branches::getOptionsArray())
                    ->allowHtml()
                    ->searchable(),
                Forms\Components\RichEditor::make('remarks')
                    ->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('PO#')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->formatStateUsing(fn($state)=>Str::headline($state))
                    ->badge(),
                Tables\Columns\TextColumn::make('supplier.supplier_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('branch.branch_name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(''),
                    
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPurchaseOrders::route('/'),
            'create' => Pages\CreatePurchaseOrder::route('/create'),
            'edit' => Pages\EditPurchaseOrder::route('/{record}/edit'),
        ];
    }
}
