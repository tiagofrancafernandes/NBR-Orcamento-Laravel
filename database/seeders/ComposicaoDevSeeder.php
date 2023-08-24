<?php

namespace Database\Seeders;

use App\Models\Insumo;
use App\Models\Composicao;
use Illuminate\Database\Seeder;
use App\Models\Nbr;
use App\Models\Sinapi;

class ComposicaoDevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sinapi = Sinapi::firstOrCreate(
            [
                'codigo' => 32,
            ],
            [
                'descricao' => 'Aço SINAPI',
                'codigo' => 32,
            ],
        );

        $nbr = Nbr::firstOrCreate(
            [
                'codigo' => 'ABC123',
            ],
            [
                'descricao' => 'Aço NBR',
                'codigo' => 'ABC123',
            ],
        );

        $insumo = Insumo::create([
            'unidade_medida' => 'Kg',
            'codigo_sinapi' => $sinapi->codigo,
            'codigo_nbr' => $nbr->codigo,
        ]);

        $composicao = Composicao::create([]);

        // TODO: ComposicaoItem
        // $insumoComposicao = \App\Models\InsumoComposicao::firstOrCreate(
        //     [
        //         'insumo_id' => $insumo->id,
        //         'composicao_id' => $composicao->id,
        //     ],
        //     [
        //         'insumo_id' => $insumo->id,
        //         'composicao_id' => $composicao->id,
        //         'coeficiente' => '0.5',
        //     ]
        // );

        // dump('insumoComposicao', $insumoComposicao->toArray());
        dump('insumo', $insumo->toArray());
    }
}
