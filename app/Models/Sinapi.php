<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Sinapi
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $descricao
 * @property string $codigo
 * @property string $custo
 * @property int $unidade_medida
 * @property-read mixed $nbr_relacionadas_as_string
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Nbr> $nbrRelacionadas
 * @property-read int|null $nbr_relacionadas_count
 * @method static \Database\Factories\SinapiFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereCusto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereUnidadeMedida($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereUpdatedAt($value)
 * @mixin \Eloquent
 * @mixin IdeHelperSinapi
 */
class Sinapi extends Model
{
    use HasFactory;

    protected $table = 'sinapi';

    protected $fillable = [
        'descricao',
        'codigo',
        'custo',
        'unidade_medida',
    ];

    /**
     * getByCodigo function
     *
     * @param mixed $codigo
     * @return ?Sinapi
     */
    public static function getByCodigo(mixed $codigo): ?Sinapi
    {
        if (!$codigo || !\is_string($codigo) || !trim($codigo)) {
            return null;
        }

        return Cache::remember(
            "sinapi-by-codigo-{$codigo}",
            (24 * 60 * 60) /*secs*/,
            fn () => Sinapi::whereCodigo(trim($codigo))->first()
        );
    }

    /**
     * The nbrRelacionadas that belong to the user.
     */
    public function nbrRelacionadas(): BelongsToMany
    {
        return $this->belongsToMany(
            Nbr::class,
            'nbr_sinapi',
            'sinapi_codigo',
            'nbr_codigo',
            'codigo',
            'codigo',
        );
    }

    public function getNbrRelacionadasAsStringAttribute()
    {
        $cacheKey = implode('-', [__FUNCTION__, $this->codigo]);

        return Cache::remember(
            $cacheKey,
            300 /*secs*/,
            fn () => $this?->nbrRelacionadas()?->select('descricao', 'codigo')->pluck('codigo')?->implode(', ')
        );
    }
}
