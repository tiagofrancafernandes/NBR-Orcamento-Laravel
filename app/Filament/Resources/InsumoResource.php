<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Insumo;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Enums\UnidadeMedidaEnum;
use Filament\Resources\Resource;
use App\Filament\Resources\InsumoResource\Pages;

class InsumoResource extends Resource
{
    protected static ?string $model = Insumo::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('preco')
                    ->maxLength(255),

                Forms\Components\Select::make('unidade_medida')
                    ->searchable()
                    ->options(UnidadeMedidaEnum::enums(onlyIds: false, tranlate: true)),

                Forms\Components\Select::make('codigo_sinapi')
                    ->label('general.form.codigo_sinapi')->translateLabel()
                    ->relationship('sinapi', 'descricao')
                    ->searchable(),

                Forms\Components\Select::make('codigo_nbr')
                    ->label('general.form.codigo_nbr')->translateLabel()
                    ->relationship('nbr', 'descricao')
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('preco'),
                Tables\Columns\TextColumn::make('unidade_medida'),
                Tables\Columns\TextColumn::make('codigo_sinapi'),
                Tables\Columns\TextColumn::make('codigo_nbr'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListInsumos::route('/'),
            'create' => Pages\CreateInsumo::route('/create'),
            'edit' => Pages\EditInsumo::route('/{record}/edit'),
        ];
    }
}
