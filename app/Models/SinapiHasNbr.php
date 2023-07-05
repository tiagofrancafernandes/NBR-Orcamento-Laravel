<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SinapiHasNbr extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo_sinapi',
        'codigo_nbr',
        'descricao',
    ];

    /**
     * Get the sinapi associated with the SinapiHasNbr
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sinapi(): HasOne
    {
        return $this->hasOne(Sinapi::class, 'codigo', 'codigo_sinapi');
    }

    /**
     * Get the nbr associated with the SinapiHasNbr
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nbr(): HasOne
    {
        return $this->hasOne(Nbr::class, 'codigo', 'codigo_nbr');
    }
}
