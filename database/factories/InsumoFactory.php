<?php

namespace Database\Factories;

use App\Models\Nbr;
use App\Models\Sinapi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insumo>
 */
class InsumoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_sinapi' => Sinapi::select('codigo')->inRandomOrder()->first()?->codigo ?? null,
            'codigo_nbr' => Nbr::select('codigo')->inRandomOrder()->first()?->codigo ?? null,
        ];
    }
}
