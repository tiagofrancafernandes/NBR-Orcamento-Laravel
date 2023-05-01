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

            'codigo_sinapi' => Sinapi::factory()->createOne(),
            'descricao_sinapi' => \ucfirst(fake('pt_BR')->words(6, true)),
            'codigo_nbr' => Nbr::factory()->createOne(),
            'descricao_nbr' => \ucfirst(fake('pt_BR')->words(6, true)),
            'unidade_medida' => Arr::random([
                'CM', 'UN',
                'D', 'H',
                'Kg', 'L',
                'g', 'M',
                'mg',
            ]),
            'valor_consolidado' => sprintf('%d.%d', rand(10, 1500), rand(10, 99)),
        ];
    }
}
