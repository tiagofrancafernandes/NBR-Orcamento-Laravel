<?php

namespace Database\Factories;

use App\Enums\UnidadeMedidaEnum;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SinapiCodigo>
 */
class SinapiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => \rand(100, 999) . date('ms'),
            'descricao' => fn ($att) => 'FAKE SINAPI - ' . ($att['codigo'] ?? ''),
            'custo' => number_format(\rand(100, 999) . '.' . date('ms'), 2, '.', ''),
            'unidade_medida' => Arr::random(UnidadeMedidaEnum::enums(true)),
        ];
    }
}
