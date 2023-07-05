<?php

namespace Database\Factories;

use App\Models\Nbr;
use App\Models\Sinapi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SinapiHasNbr>
 */
class SinapiHasNbrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_sinapi' => Sinapi::factory(),
            'codigo_nbr' => Nbr::factory(),
            'descricao' => fake()->words(5, true),
        ];
    }
}
