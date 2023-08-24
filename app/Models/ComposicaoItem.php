<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// TODO: criar eventos para ouvir criação/atualização e deleção de item (atualizar as composições relacionadas)
/**
 * App\Models\ComposicaoItem
 *
 * @property int $id
 * @property int $composicao_id
 * @property string $item_type
 * @property string $item_id
 * @property string|null $item_id_column
 * @property bool|null $is_a_composicao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $coeficiente
 * @property-read \App\Models\Composicao $composicao
 * @property-read null|\Illuminate\Database\Eloquent\Model $item
 * @property-read mixed $valor_calculado
 * @property-read mixed $valorCalculado
 * @method static \Database\Factories\ComposicaoItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereCoeficiente($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereComposicaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereIsAComposicao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereItemIdColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereItemType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ComposicaoItem whereUpdatedAt($value)
 * @mixin \Eloquent
 * @mixin IdeHelperComposicaoItem
 */
class ComposicaoItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'composicao_id',
        'item_type',
        'item_id',
        'item_id_column',
        'is_a_composicao',
        'coeficiente',
    ];

    protected $casts = [
        'is_a_composicao' => 'boolean',
    ];

    protected $appends = [
        'item',
        'valorCalculado',
    ];

    /**
     * Get the composicao that owns the ComposicaoItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function composicao(): BelongsTo
    {
        return $this->belongsTo(Composicao::class, 'composicao_id', 'id');
    }

    /**
     * item function
     *
     * @return null|\Illuminate\Database\Eloquent\Builder
     */
    public function item(): null|\Illuminate\Database\Eloquent\Builder
    {
        $itemType = $this->{'item_type'} ?? null;
        $itemId = $this->{'item_id'} ?? null;
        $itemIdColumn = $this->{'item_id_column'} ?? 'id';

        if (!$itemType || !$itemId || !class_exists($itemType)) {
            return null;
        }

        return call_user_func(
            [$itemType, 'where'],
            $itemIdColumn,
            $itemId
        );
    }

    /**
     * item function
     *
     * @return null|Model
     */
    public function getItemAttribute(): null|Model
    {
        $itemType = $this->{'item_type'} ?? null;
        $itemId = $this->{'item_id'} ?? null;
        $itemIdColumn = $this->{'item_id_column'} ?? 'id';

        if (!$itemType || !$itemId || !class_exists($itemType)) {
            return null;
        }

        $cacheKey = md5(
            implode('-', [
                $itemType, $itemId, $itemIdColumn,
            ])
        );

        return \Illuminate\Support\Facades\Cache::remember(
            $cacheKey,
            60 /*secs*/,
            fn () => $this->item()?->first() ?? null
        );
    }

    public function getValorCalculadoAttribute()
    {
        $item = $this->item;

        if (!$item) {
            return null;
        }

        if ($this->is_a_composicao) {
            return $item?->valor_consolidado;
        }

        $custo = $item?->custo ?: null;

        if (!$custo || !$this->coeficiente || !is_numeric($custo) || !is_numeric($this->coeficiente)) {
            return null;
        }

        return floatval($custo) * floatval($this->coeficiente);
    }
}
