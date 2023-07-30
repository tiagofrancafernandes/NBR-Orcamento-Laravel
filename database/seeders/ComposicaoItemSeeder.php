<?php

namespace Database\Seeders;

use App\Models\Composicao;
use App\Models\ComposicaoItem;
use Illuminate\Database\Seeder;

class ComposicaoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComposicaoItem::factory(8)->create();
        ComposicaoItem::factory()->createOne([
            'item_type' => Composicao::class,
            'item_id' => Composicao::factory(),
            'is_a_composicao' => true,
        ]);
        ComposicaoItem::factory(10)->create();
    }
}
