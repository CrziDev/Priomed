<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplyResource\Pages;
use App\Filament\Resources\SupplyResource\RelationManagers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Generic;
use App\Models\Supply;
use App\Models\Unit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplyResource extends Resource
{
    protected static ?string $model = Supply::class;
    protected static ?string $navigationGroup = 'Inventory Management';
    protected static ?int $navigationSort = 1;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->columnSpanFull(),
                Forms\Components\Fieldset::make('Supply Information')
                    ->hiddenLabel()
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->options(Category::getOptionArray(false))
                            ->native(false)
                            ->label('Category')
                            ->preload()
                            ->searchable(),
                        Forms\Components\Select::make('unit_id')
                            ->options(Unit::getOptionArray(false))
                            ->native(false)
                            ->preload()
                            ->label('Unit')
                            ->searchable(),
                        Forms\Components\Select::make('generic_id')
                            ->options(Generic::getOptionArray(false))
                            ->native(false)
                            ->preload()
                            ->label('Generic')
                            ->searchable(),
                        Forms\Components\Select::make('brand_id')
                            ->options(Brand::getOptionArray(false))
                            ->native(false)
                            ->preload()
                            ->label('Brand')
                            ->searchable(),
                    ])->columns(2),
                Forms\Components\Textarea::make('description')
                    ->rows(5)
                    ->cols(8)
                    ->columnSpanFull()
                    ->autosize(),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('unit.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSupplies::route('/'),
            'create' => Pages\CreateSupply::route('/create'),
            'edit' => Pages\EditSupply::route('/{record}/edit'),
        ];
    }
}
