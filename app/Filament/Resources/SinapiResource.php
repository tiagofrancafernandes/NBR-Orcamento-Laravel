<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Sinapi;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Enums\UnidadeMedidaEnum;
use Filament\Resources\Resource;
use App\Filament\Resources\SinapiResource\Pages;

class SinapiResource extends Resource
{
    protected static ?string $model = Sinapi::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(300),

                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('custo')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('unidade_medida')
                    ->searchable()
                    ->options(UnidadeMedidaEnum::enums(onlyIds: false, tranlate: true))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable()
                    ->icon('heroicon-o-clipboard')
                    ->iconPosition('before')
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->copyMessageDuration(1500)
                    ->tooltip(fn ($record) => $record->descricao)
                    ->sortable(),

                Tables\Columns\TextColumn::make('descricao')
                    ->searchable()
                    ->tooltip(fn ($record) => $record->descricao)
                    ->toggleable()
                    ->toggledHiddenByDefault(false)
                    ->size('sm')
                    ->limit(100),

                Tables\Columns\TextColumn::make('custo'),

                Tables\Columns\TextColumn::make('unidade_medida')
                    ->enum(UnidadeMedidaEnum::enums(onlyIds: false, tranlate: true)),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable()
                    ->toggledHiddenByDefault(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSinapis::route('/'),
        ];
    }

    public static function getPluralModelLabel(): string
    {
        return 'Sinapi';
    }
}
