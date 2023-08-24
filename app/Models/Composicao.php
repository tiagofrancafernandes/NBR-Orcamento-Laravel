<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Composicao
 *
 * @property int $id
 * @property int|null $composicao_ref
 * @property string|null $codigo_sinapi
 * @property string|null $codigo_nbr
 * @property string|null $unidade_medida
 * @property string|null $valor_consolidado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $descricao_curta
 * @property string|null $descricao_longa
 * @property-read Composicao|null $composicaoReferencia
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Composicao> $composicoesFilhas
 * @property-read int|null $composicoes_filhas_count
 * @property-read mixed $tem_composicao_ref
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ComposicaoItem> $items
 * @property-read int|null $items_count
 * @property-read \App\Models\Nbr|null $nbr
 * @property-read \App\Models\Sinapi|null $sinapi
 * @method static \Database\Factories\ComposicaoFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao query()
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereCodigoNbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereCodigoSinapi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereComposicaoRef($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereDescricaoCurta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereDescricaoLonga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereUnidadeMedida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Composicao whereValorConsolidado($value)
 * @mixin \Eloquent
 * @mixin IdeHelperComposicao
 */
class Composicao extends Model
{
    use HasFactory;

    protected $table = 'composicoes';

    protected $fillable = [
        'composicao_ref',
        'descricao_curta',
        'descricao_longa',
        'codigo_sinapi',
        'codigo_nbr',
        'unidade_medida',
        'valor_consolidado',
    ];

    protected $appends = [
        'temComposicaoRef',
        'composicoesFilhasCount',
    ];

    /**
     * Get the composicoesFilhas that owns the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function composicoesFilhas(): HasMany
    {
        return $this->hasMany(Composicao::class, 'composicao_ref', 'id');
    }

    /**
     * Get the composicaoReferencia that owns the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function composicaoReferencia(): BelongsTo
    {
        return $this->belongsTo(Composicao::class, 'composicao_ref', 'id');
    }

    /**
     * Get the sinapi that owns the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sinapi(): BelongsTo
    {
        return $this->belongsTo(Sinapi::class, 'codigo_sinapi', 'codigo');
    }

    /**
     * Get the nbr that owns the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nbr(): BelongsTo
    {
        return $this->belongsTo(Nbr::class, 'codigo_nbr', 'codigo');
    }

    /**
     * Get all of the insumos for the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function insumos(): HasManyThrough
    {
        // TODO
        // return $this->hasManyThrough(
        //     Insumo::class,
        //     InsumoComposicao::class, // ComposicaoItem
        //     'composicao_id',
        //     'id',
        //     'id',
        //     'insumo_id',
        // );
    }

    public function getTemComposicaoRefAttribute()
    {
        return (bool) $this->composicao_ref;
    }

    public function getComposicoesFilhasCountAttribute()
    {
        return $this->composicoesFilhas()->count();
    }

    /**
     * Get all of the items for the Composicao
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items(): HasMany
    {
        return $this->hasMany(ComposicaoItem::class, 'composicao_id', 'id');
    }
}
