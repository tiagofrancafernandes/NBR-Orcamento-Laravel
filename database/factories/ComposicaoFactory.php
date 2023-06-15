<?php

namespace Database\Factories;

use App\Models\Nbr;
use App\Models\Sinapi;
use App\Models\Composicao;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Composicao>
 */
class ComposicaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'composicao_ref' => Arr::random([
                Composicao::factory(),
                \null, \null, \null, \null,
            ]),

            'codigo_sinapi' => Sinapi::select('codigo')->inRandomOrder()->first()?->codigo,
            'codigo_nbr' => Nbr::select('codigo')->inRandomOrder()->first()?->codigo,
            'unidade_medida' => Arr::random([
                'CM', 'UN',
                'D', 'H',
                'Kg', 'L',
                'g', 'M',
                'mg',
            ]),
            'valor_consolidado' => sprintf('%d.%d', rand(10, 1500), rand(10, 99)),
            'descricao_curta' => 'Descrição curta da composicao ' . \fake('pt_BR')->words(5, \true),
            'descricao_longa' => \fake('pt_BR')->sentence(15),
        ];
    }
}
