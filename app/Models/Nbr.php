<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nbr extends Model
{
    use HasFactory;

    protected $table = 'nbr';

    protected $fillable = [
        'descricao',
        'codigo',
    ];
}
