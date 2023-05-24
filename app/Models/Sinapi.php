<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
 * @mixin \Eloquent
 */
class Sinapi extends Model
{
    use HasFactory;

    protected $table = 'sinapi';

    protected $fillable = [
        'descricao',
        'codigo',
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
}
