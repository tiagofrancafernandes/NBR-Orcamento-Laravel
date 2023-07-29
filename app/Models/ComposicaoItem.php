<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// TODO: criar eventos para ouvir criação/atualização e deleção de item (atualizar as composições relacionadas)
class ComposicaoItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'composicao_id',
        'item_type',
        'item_id',
        'item_id_column',
        'is_a_composicao',
    ];

    protected $casts = [
        'is_a_composicao' => 'boolean',
    ];

    protected $appends = [
        // 'item',
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
        return $this->item()?->first() ?? null;
    }
}
