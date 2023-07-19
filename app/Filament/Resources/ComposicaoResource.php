<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Composicao;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Enums\UnidadeMedidaEnum;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\ComposicaoResource\Pages;

class ComposicaoResource extends Resource
{
    protected static ?string $model = Composicao::class;
    protected static ?string $slug = 'composicoes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('composicao_referencia')
                    ->label('Composição referência')
                    ->schema([
                        Forms\Components\Toggle::make('temComposicaoRef')
                            ->default(true)
                            // ->mutateDehydratedStateUsing(fn() => true)
                            // ->dehydrated(false)
                            ->reactive(),

                        Forms\Components\Select::make('composicaoReferencia')
                            ->hidden(fn (callable $get) => !$get('temComposicaoRef'))
                            ->relationship('composicaoReferencia', 'descricao_curta')
                            ->columnSpanFull()
                            ->searchable(),
                    ]),

                Grid::make(2)
                    ->schema([
                        Forms\Components\Select::make('codigo_sinapi')
                            ->required()
                            ->label('general.form.codigo_sinapi')->translateLabel()
                            ->relationship('sinapi', 'descricao')
                            ->searchable(),

                        Forms\Components\Select::make('codigo_nbr')
                            ->required()
                            ->label('general.form.codigo_nbr')->translateLabel()
                            ->relationship('nbr', 'descricao')
                            ->searchable(),

                        Forms\Components\TextInput::make('descricao_curta')
                            ->columnSpanFull(),

                        Forms\Components\Select::make('unidade_medida')
                            ->required()
                            ->searchable()
                            ->options(UnidadeMedidaEnum::enums(onlyIds: false, tranlate: true)),
                    ]),

                Forms\Components\Hidden::make('valor_consolidado'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(isIndividual: true),

                Tables\Columns\TextColumn::make('codigo_sinapi')
                    ->sortable()
                    ->searchable(isIndividual: true),

                Tables\Columns\TextColumn::make('codigo_nbr')
                    ->sortable()
                    ->searchable(isIndividual: true),

                Tables\Columns\TextColumn::make('descricao_curta')
                    ->searchable(isIndividual: true)
                    ->limit(40)
                    ->tooltip(fn (?Model $record) => $record?->descricao_curta),

                Tables\Columns\TextColumn::make('unidade_medida')
                    ->enum(UnidadeMedidaEnum::enums(onlyIds: false, tranlate: true)),

                Tables\Columns\TextColumn::make('composicaoReferencia.descricao_curta')
                    ->label('Desc. da comp. ref')
                    ->limit(25)
                    ->tooltip(fn (?Model $record) => $record?->descricao_curta)
                    ->searchable(isIndividual: true),

                Tables\Columns\TextColumn::make('composicoesFilhasCount')
                    ->label('Composicoes filhas')
                    ->toggleable()
                    ->toggledHiddenByDefault(),

                Tables\Columns\TextColumn::make('valor_consolidado')
                    ->toggleable()
                    ->toggledHiddenByDefault(),

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

    public static function getModelLabel(): string
    {
        return __('general.composicoes.label_singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('general.composicoes.label_plural');
    }

    public static function getNavigationLabel(): string
    {
        return __('general.composicoes.label_plural');
    }

    protected static function getNavigationIcon(): string
    {
        return 'heroicon-s-puzzle';
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('general.groups.composicoes');
    }
}
