<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Composicao;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Enums\UnidadeMedidaEnum;
use Filament\Resources\Resource;
use App\Filament\Resources\ComposicaoResource\Pages;

class ComposicaoResource extends Resource
{
    protected static ?string $model = Composicao::class;
    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $pluralModelLabel = 'composicoes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('composicao_ref')
                Forms\Components\Select::make('composicao_ref')
                    ->relationship('composicaoReferencia', 'descricao_curta')
                    ->searchable(),

                Forms\Components\Select::make('codigo_sinapi')
                    ->label('general.form.codigo_sinapi')->translateLabel()
                    ->relationship('sinapi', 'descricao')
                    ->searchable(),

                Forms\Components\Select::make('codigo_nbr')
                    ->label('general.form.codigo_nbr')->translateLabel()
                    ->relationship('nbr', 'descricao')
                    ->searchable(),

                Forms\Components\Select::make('unidade_medida')
                    ->searchable()
                    ->options(UnidadeMedidaEnum::enums(onlyIds: false, tranlate: true)),

                Forms\Components\TextInput::make('valor_consolidado')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('composicao_ref'),
                Tables\Columns\TextColumn::make('codigo_sinapi'),
                Tables\Columns\TextColumn::make('codigo_nbr'),
                Tables\Columns\TextColumn::make('unidade_medida'),
                Tables\Columns\TextColumn::make('valor_consolidado'),
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
            'index' => Pages\ListComposicaos::route('/'),
            'create' => Pages\CreateComposicao::route('/create'),
            'edit' => Pages\EditComposicao::route('/{record}/edit'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament/resources/general.composicoes');
    }
}
