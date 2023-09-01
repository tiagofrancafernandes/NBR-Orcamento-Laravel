<?php

namespace App\Filament\Resources\ComposicaoResource\RelationManagers;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Insumo;
use App\Models\Composicao;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\ComposicaoItem;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ComposicaoResource;
use Filament\Resources\RelationManagers\RelationManager;
use App\Filament\Extends\Tables\Columns\TooglableTextInputColumn;

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
                    ->sortable()
                    ->limit(10),

                Tables\Columns\TextColumn::make('custom_id')
                    ->label('ID do item')
                    ->formatStateUsing(function (?ComposicaoItem $record) {
                        if (!$record) {
                            return '';
                        }

                        $text = 'ID ' . ($record?->is_a_composicao ? 'da composição' : ' do insumo') . ': ';
                        $text .= $record?->item_id;

                        return $text;
                    }),

                Tables\Columns\TextColumn::make('item_descricao')
                    ->label('Descrição')
                    ->formatStateUsing(function (?ComposicaoItem $record) {
                        if (!$record || !$record?->item) {
                            return '';
                        }

                        $item = $record->item;

                        $descricao = $record->is_a_composicao ? $item?->descricao_curta : ($item?->descricaoNbr ?: '');

                        return mb_strimwidth($descricao ?: '', 0, 20, '...');
                    })
                    ->tooltip(function (?ComposicaoItem $record) {
                        if (!$record || !$record?->item) {
                            return '';
                        }

                        $item = $record->item;

                        if ($record->is_a_composicao) {
                            return $item?->descricao_curta;
                        }

                        return $item?->descricaoSinapi ?: '';
                    }),

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

                Tables\Columns\TextColumn::make('custo')
                    ->label('Custo')
                    ->formatStateUsing(function (?ComposicaoItem $record) {
                        if (!$record || $record->is_a_composicao || !$record?->item) {
                            return '';
                        }

                        if (!$record?->item?->custo) {
                            return '';
                        }

                        $amount = $record?->item?->custo ?? null;

                        return money($amount, 'BRL', is_float($amount));
                    })
                    ->columnSpan(1),

                TooglableTextInputColumn::make('coeficiente')
                    ->placeholder('Entre 0 e 1 Ex.: 0.24|0.45|0.5')
                    ->tooltip('Entre 0 e 1 Ex.: 0.24|0.45|0.5. Ao clicar fora do campo, o valor será atualizado.')
                    ->type(fn (?ComposicaoItem $record) => !$record->is_a_composicao ? 'number' : 'hidden')
                    ->rules([
                        'numeric',
                        'min:0',
                        'max:1',
                    ])
                    ->disabled((function (?ComposicaoItem $record) {
                        if (!$record || $record?->is_a_composicao) {
                            return true;
                        }

                        return false;
                    }))
                    ->disableClick(),

                Tables\Columns\TextColumn::make('formated_coeficiente')
                    ->label('Coeficiente')
                    ->formatStateUsing(function (?ComposicaoItem $record) {
                        if (!$record || $record->is_a_composicao || !$record?->item) {
                            return '';
                        }

                        return $record->coeficiente
                            . ' (' . (100 * ($record->coeficiente) . ('%')) . ')';
                    })
                    ->columnSpan(1),

                Tables\Columns\TextColumn::make('valor_calculado')
                    ->label('Valor calculado')
                    ->formatStateUsing(function (?ComposicaoItem $record) {
                        if (!$record || !$record?->item) {
                            return '';
                        }

                        if (!$record?->valorCalculado) {
                            return '';
                        }

                        $amount = $record?->valorCalculado;

                        return money($amount, 'BRL', is_float($amount));
                    })
                    ->columnSpan(1),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\AttachAction::make()
                //     ->inverseRelationshipName('insumos'),

                Tables\Actions\CreateAction::make()
                    ->label(__('general.composicoes.add_item'))
                    // ->inverseRelationshipName('composicao')
                    ->form(function ($livewire) {
                        $ownerRecord = $livewire?->ownerRecord ?? null;
                        $ownerRecordId = $ownerRecord?->id ?? null;
                        // dd($record, $action, $livewire?->ownerRecord); //TODO: Remover. Teste ownerRecord
                        // dd($livewire?->ownerRecord?->id); //TODO: Remover. Teste ownerRecord

                        return [
                            \Filament\Forms\Components\Radio::make('item_type')
                                ->label(__('general.composicao_item.item_type_label_singular'))
                                ->rule('in:' . implode(',', [
                                    Insumo::class,
                                    Composicao::class,
                                ]))
                                ->inline()
                                ->options([
                                    Insumo::class => 'Insumo',
                                    Composicao::class => 'Composição',
                                ])
                                ->descriptions([
                                    Insumo::class => 'Insumos',
                                    Composicao::class => 'Composição filha',
                                ])
                                ->reactive()
                                ->default(Insumo::class)
                                ->required(),

                            \Filament\Forms\Components\Select::make('item_id')
                                ->statePath('item_id')
                                ->getSearchResultsUsing(
                                    // fn (string $search) => Insumo::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id')
                                    function (string $search, callable $get) use ($ownerRecordId) {
                                        if ($get('item_type') == Composicao::class) {
                                            // 'descricao_curta'
                                            // 'descricao_longa'
                                            // 'codigo_sinapi'
                                            // 'codigo_nbr'

                                            $query = Composicao::query()
                                                ->join('sinapi', 'codigo_sinapi', 'sinapi.codigo')
                                                ->join('nbr', 'codigo_nbr', 'nbr.codigo')
                                                ->select([
                                                    'composicoes.*',
                                                    'sinapi.codigo as sinapi_codigo',
                                                    'sinapi.descricao as sinapi_descricao',
                                                    'nbr.codigo as nbr_codigo',
                                                    'nbr.descricao as nbr_descricao',
                                                ])
                                                // ->whereRaw("CONCAT(id, ' ', item_id) != ?", [41 . ' ' . 1])
                                                // ->whereRaw("CONCAT(id, ' ', item_id) != ?", [41 . ' ' . 1])
                                                ->when(
                                                    is_numeric($search) ? $search : null,
                                                    fn (Builder $query, $date): Builder => $query->where(
                                                        'id',
                                                        'like',
                                                        $date . '%'
                                                    ),
                                                )
                                                // ->whereNull('composicoes.composicao_ref') // Pode pertencenr a quem também é filha???
                                                ->where(function (Builder $query) use ($search) {
                                                    return $query->where('composicoes.descricao_curta', 'like', "%{$search}%")
                                                        ->orWhere('composicoes.descricao_longa', 'like', "%{$search}%")
                                                        ->orWhere('sinapi.descricao', 'like', "%{$search}%")
                                                        ->orWhere('sinapi.descricao', 'like', "%{$search}%")
                                                        ->orWhere('sinapi.codigo', 'like', "%{$search}%")
                                                        ->orWhere('nbr.descricao', 'like', "%{$search}%")
                                                        ->orWhere('nbr.codigo', 'like', "%{$search}%");
                                                });

                                            if ($ownerRecordId) {
                                                $query->where('composicoes.id', '!=', $ownerRecordId); // Não ser ref de si mesma
                                            }

                                            return $query
                                                ->limit(10)
                                                ->pluck(
                                                    'composicoes.descricao_curta',
                                                    'composicoes.id',
                                                );
                                        }

                                        return Insumo::join('sinapi', 'codigo_sinapi', 'codigo')
                                            ->select([
                                                'insumos.*',
                                                'sinapi.codigo', 'sinapi.descricao'
                                            ])
                                            ->where('descricao', 'like', "%{$search}%")
                                            ->orWhere('codigo', 'like', "%{$search}%")
                                            ->limit(30)
                                            ->pluck(
                                                'sinapi.descricao',
                                                'insumos.id',
                                            );
                                    }
                                )
                                ->getOptionLabelUsing(fn ($value): ?string => Insumo::find($value)?->name)
                                ->label(
                                    fn (callable $get) => $get('item_type') == Composicao::class
                                        ? __('general.composicoes.label_singular')
                                        : __('general.insumos.label_singular')
                                )
                                ->searchable()
                                ->getOptionLabelFromRecordUsing(
                                    fn (Model $record) => mb_strimwidth(strval($record?->descricao), 0, 50, '...') . ' - #' . $record?->id
                                )
                                ->required()
                                // ->unique(callback: function (
                                //     \Illuminate\Validation\Rules\Unique $rule,
                                //     callable $get,
                                //     callable $set,
                                //     $livewire,
                                // ) {
                                //     return $rule;
                                //     $ownerRecord = $livewire?->ownerRecord ?? null;

                                //     if (!$get('item_type') || !$ownerRecord) {
                                //         return $rule;
                                //     }

                                //     // dd($rule, $ownerRecord);
                                //     // dd($get('item_id.insumo'));
                                //     // 'composicao_id',
                                //     // 'item_type',
                                //     // 'item_id',

                                //     return $rule
                                //         ->where('composicao_id', $ownerRecord?->id)
                                //         ->where('item_type', $get('item_type'))
                                //         ->where('item_id', $get('item_id_insumo'));
                                // })
                                ->rules([
                                    function (
                                        callable $get,
                                        callable $set,
                                        $livewire,
                                    ) {
                                        $ownerRecord = $livewire?->ownerRecord ?? null;

                                        if (!$get('item_type') || !$ownerRecord) {
                                            return;
                                        }

                                        return function (string $attribute, $value, $fail) use (
                                            $ownerRecord,
                                            $get,
                                            $set,
                                        ) {
                                            if (!$ownerRecord->id) {
                                                return $fail(__('validation.custom.invalid_field', [
                                                    'attribute' => 'ID da composição',
                                                ]));
                                            }

                                            if (!$get('item_type')) {
                                                return $fail(__('validation.custom.invalid_field', [
                                                    'attribute' => 'tipo do item',
                                                ]));
                                            }

                                            if (!$value) {
                                                return $fail(__('validation.custom.invalid_field', [
                                                    'attribute' => 'ID do item',
                                                ]));
                                            }

                                            if (
                                                ComposicaoItem::where('composicao_id', $ownerRecord->id)
                                                ->where('item_type', $get('item_type'))
                                                ->where('item_id', $value)
                                                ->exists()
                                            ) {
                                                return $fail(__('validation.custom.exists'));
                                            }
                                        };
                                    },
                                ])
                                ->searchable(),
                        ];
                    })
                    ->mutateFormDataUsing(function (array $data, $livewire): array {
                        $ownerRecord = $livewire?->ownerRecord ?? null;

                        // $data['user_id'] = auth()->id();
                        $types = [
                            Insumo::class => 'Insumo',
                            Composicao::class => 'Composicao',
                        ];

                        $itemType = $types[$data['item_type']] ?? null;
                        $itemIdKey = str($itemType)->afterLast('\\')->snake()->toString();
                        $itemId = ($data['item_id'] ?? null) ?: null;

                        if (!$itemType || !$itemId) {
                            return []; // TODO: talvez seja ideal notificar erro aqui (?? ou retornar o $data como está?)
                        }

                        $data['is_a_composicao'] = $itemIdKey === 'composicao';
                        $data['composicao_id'] = $ownerRecord?->id;
                        $data['item_id'] = $itemId;

                        return $data;
                    })
                    ->action(function ($data) {
                        $data = array_filter(
                            $data,
                            fn ($key) => in_array($key, [
                                'composicao_id',
                                'item_type',
                                'item_id',
                                'is_a_composicao',
                            ], true),
                            ARRAY_FILTER_USE_KEY
                        );

                        $createdItem = ComposicaoItem::create($data);

                        if ($createdItem) {
                            return Notification::make()
                                ->success()
                                ->title('Sucesso')
                                ->body('Sucesso ao cadastrar item')
                                ->send();
                        }

                        return Notification::make()
                            ->danger()
                            ->title('Falha')
                            ->body('Falha ao cadastrar item')
                            ->send();
                    }),
            ])
            ->actions([
                Tables\Actions\Action::make('custom_record_view')
                    ->label(__('general.composicoes.edit_single_label'))
                    ->color('secondary')
                    ->icon('heroicon-s-eye')
                    ->url(fn (?Model $record) => ComposicaoResource::getUrl('edit', ['record' => $record?->item_id]))
                    ->hidden(fn (?Model $record) => !($record?->is_a_composicao))
                    ->link(),
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DissociateAction::make()
                //     ->inverseRelationshipName('composicao'),

                Tables\Actions\DeleteAction::make()
                    ->extraAttributes([
                        'class' => 'cursor-pointer',
                    ], true),
            ])
            ->bulkActions([
                Tables\Actions\DissociateBulkAction::make(),
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
