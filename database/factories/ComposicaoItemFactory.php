<?php

namespace Database\Factories;

use App\Models\Composicao;
use App\Models\Insumo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComposicaoItem>
 */
class ComposicaoItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'composicao_id' => Composicao::factory(),
            'item_type' => Insumo::class,
            'item_id' => Insumo::factory(),
            'is_a_composicao' => false,
        ];
    }
}
