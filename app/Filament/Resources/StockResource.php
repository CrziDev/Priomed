<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StockResource\Pages;
use App\Models\Stock;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class StockResource extends Resource
{
    protected static ?string $model = Stock::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Inventory';
    
 
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('branch.branch_name'),
                Tables\Columns\TextColumn::make('supplies.supply.name')->label('Supply Name'),
                Tables\Columns\TextColumn::make('supplies.quantity')->label('Quantity'),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListStocks::route('/'),
            'create' => Pages\CreateStock::route('/create'),
            'edit' => Pages\EditStock::route('/{record}/edit'),
        ];
    }
}
