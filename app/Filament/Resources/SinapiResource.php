<?php

namespace App\Filament\Resources;

use App\Models\Nbr;
use Filament\Forms;
use Filament\Tables;
use App\Models\Sinapi;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Enums\UnidadeMedidaEnum;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SinapiResource\Pages;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Filament\Resources\SinapiResource\RelationManagers\NbrRelationManager;

class SinapiResource extends Resource
{
    protected static ?string $model = Sinapi::class;
    protected static ?string $slug = 'sinapi';

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('codigo')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('descricao')
                    ->required()
                    ->maxLength(300),

                Forms\Components\TextInput::make('custo')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('unidade_medida')
                    ->searchable()
                    ->options(UnidadeMedidaEnum::enums(onlyIds: false, tranlate: true))
                    ->required(),

                // \Filament\Forms\Components\MorphToSelect::make('nbrGroup')
                //     ->types([
                //         \Filament\Forms\Components\MorphToSelect\Type::make(Sinapi::class)->titleColumnName('Sinapi'),
                //         \Filament\Forms\Components\MorphToSelect\Type::make(Nbr::class)->titleColumnName('Nbr'),
                //     ]),
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

                Tables\Columns\TextColumn::make('nbrRelacionadasAsString')
                    ->label('NBR Relacionadas')
                    ->extraAttributes(function ($record) {
                        return [
                            'x-data' => '{}',
                            'x-tooltip.raw' => str_replace(', ', ' | ' . PHP_EOL, $record->nbrRelacionadasAsString),
                        ];
                    }, true)
                    ->toggleable()
                    ->toggledHiddenByDefault(false)
                    ->limit(30),

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
                // Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSinapis::route('/'),
            'create' => Pages\CreateSinapi::route('/create'),
            'edit' => Pages\EditSinapi::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            NbrRelationManager::class,
        ];
    }

    public static function getModelLabel(): string
    {
        return __('general.sinapi.label_singular');
    }

    public static function getPluralModelLabel(): string
    {
        return __('general.sinapi.label_plural');
    }

    public static function getNavigationLabel(): string
    {
        return __('general.sinapi.label_plural');
    }

    protected static function getNavigationIcon(): string
    {
        return 'heroicon-s-tag';
    }

    protected static function getNavigationGroup(): ?string
    {
        return __('general.groups.tabelas');
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()
            ->with([
                // 'nbrRelacionadas' => fn (BelongsToMany $query) => $query->select('descricao', 'codigo'),
            ]);
    }
}
