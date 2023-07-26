<?php

namespace App\Filament\Resources\SinapiResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Enums\UnidadeMedidaEnum;
use Filament\Resources\RelationManagers\RelationManager;

class NbrRelationManager extends RelationManager
{
    protected static string $relationship = 'nbrRelacionadas';

    protected static ?string $recordTitleAttribute = 'descricao';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable(isIndividual: true)
                    ->icon('heroicon-o-clipboard')
                    ->iconPosition('before')
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->copyMessageDuration(1500)
                    ->tooltip(fn ($record) => $record->descricao)
                    ->sortable(),

                Tables\Columns\TextColumn::make('descricao')
                    ->searchable(isIndividual: true)
                    ->tooltip(fn ($record) => $record->descricao)
                    ->toggleable()
                    ->toggledHiddenByDefault(false)
                    ->limit(40),

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
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
                Tables\Actions\AttachAction::make()
                    ->inverseRelationshipName('sinapiRelacionadas'),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
