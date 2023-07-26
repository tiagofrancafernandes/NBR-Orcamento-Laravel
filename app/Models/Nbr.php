<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * App\Models\Nbr
 *
 * @property int $id
 * @property string $descricao
 * @property string $codigo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NbrFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nbr whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Nbr extends Model
{
    use HasFactory;

    protected $table = 'nbr';

    protected $fillable = [
        'descricao',
        'codigo',
    ];

    /**
     * getByCodigo function
     *
     * @param mixed $codigo
     * @return ?Nbr
     */
    public static function getByCodigo(mixed $codigo): ?Nbr
    {
        if (!$codigo || !\is_string($codigo) || !trim($codigo)) {
            return null;
        }

        return Cache::remember(
            "nbr-by-codigo-{$codigo}",
            (24 * 60 * 60) /*secs*/,
            fn () => Nbr::whereCodigo(trim($codigo))->first()
        );
    }

    /**
     * The sinapiRelacionadas that belong to the user.
     */
    public function sinapiRelacionadas(): BelongsToMany
    {
        return $this->belongsToMany(
            Sinapi::class,
            'nbr_sinapi',
            'nbr_codigo',
            'sinapi_codigo',
            'codigo',
            'codigo',
        );
    }
}
