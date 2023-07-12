<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 * App\Models\Sinapi
 *
 * @property int $id
 * @property string $descricao
 * @property string $codigo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SinapiFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereUpdatedAt($value)
 * @property string $custo
 * @property int $unidade_medida
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereCusto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sinapi whereUnidadeMedida($value)
 * @mixin \Eloquent
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
     * Get all of the nbrGroup for the SinapiHasNbr
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function nbrGroup(): HasManyThrough
    {
        return $this->hasManyThrough(
            Nbr::class,
            SinapiHasNbr::class,
            'codigo_sinapi',
            'codigo', // Nbr
            'codigo', // Sinapi
            'codigo_nbr',
        );
    }
}
