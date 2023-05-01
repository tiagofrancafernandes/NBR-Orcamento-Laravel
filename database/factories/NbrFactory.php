<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NbrCodigo>
 */
class NbrFactory extends Factory
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
            'descricao' => fn ($att) => 'FAKE NBR - ' . ($att['codigo'] ?? ''),
        ];
    }
}
