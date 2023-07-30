<?php

namespace App\Filament\Resources\ComposicaoResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\RelationManagers\RelationManager;

class ItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'items';

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->limit(10),

                Tables\Columns\TextColumn::make('is_a_composicao')
                    ->label('É uma composição?')
                    ->formatStateUsing(function (Model $record) {
                        $trueIcon = 'heroicon-o-check-circle';
                        $falseIcon = 'heroicon-o-x-circle';

                        if ($record?->is_a_composicao ?? null) {
                            return svg($trueIcon, 'text-success-500 h-6 w-6');
                        }

                        return '';

                        return svg($falseIcon, 'h-6 w-6');
                    })
                    ->columnSpan(1),

                Tables\Columns\TextColumn::make('valor_item')
                    ->label('Valor')
                    ->formatStateUsing(function (Model $record) {
                        $item = $record?->item ?? null;

                        if (!$item || !$item?->preco) {
                            return null;
                        }

                        return money($item?->preco, 'BRL')->format();
                    })
                    ->columnSpan(1),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DissociateAction::make()
                    ->inverseRelationshipName('composicao'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DissociateBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
