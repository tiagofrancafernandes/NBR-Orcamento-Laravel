<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NbrResource\Pages;
use App\Filament\Resources\NbrResource\RelationManagers\SinapiRelationManager;
use App\Models\Nbr;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class NbrResource extends Resource
{
    protected static ?string $model = Nbr::class;
    protected static ?string $slug = 'nbr';
    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('descricao')
                    ->searchable(isIndividual: true),
                Tables\Columns\TextColumn::make('codigo')
                    ->sortable()
                    ->searchable(isIndividual: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNbrs::route('/'),
            'create' => Pages\CreateNbr::route('/create'),
            'edit' => Pages\EditNbr::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('general.nbr.label_singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('general.nbr.label_plural');
    }

    public static function getNavigationLabel(): string
    {
        return __('general.nbr.label_plural');
    }

    protected static function getNavigationIcon(): string
    {
        return 'heroicon-s-tag';
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('general.groups.tabelas');
    }

    public static function getRelations(): array
    {
        return [
            SinapiRelationManager::class,
        ];
    }
}
