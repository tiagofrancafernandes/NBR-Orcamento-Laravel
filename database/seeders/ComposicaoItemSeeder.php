<?php

namespace Database\Seeders;

use App\Models\ComposicaoItem;
use Illuminate\Database\Seeder;

class ComposicaoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ComposicaoItem::factory(15)->create();
    }
}
