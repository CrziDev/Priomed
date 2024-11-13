<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchesResource\Pages;
use App\Filament\Resources\BranchesResource\RelationManagers;
use App\Models\Branches;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchesResource extends Resource
{
    protected static ?string $model = Branches::class;
    protected static ?string $navigationGroup = 'Procurement';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('branch_name')
                    ->maxLength(100),
                Forms\Components\TextInput::make('address')
                    ->maxLength(150),
                Forms\Components\TextInput::make('contact_person')
                    ->maxLength(100),
                Forms\Components\TextInput::make('contact_number')
                    ->maxLength(20),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('branch_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_number')
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranches::route('/create'),
            'edit' => Pages\EditBranches::route('/{record}/edit'),
        ];
    }
}
