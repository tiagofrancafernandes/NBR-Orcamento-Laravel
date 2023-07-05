<?php

namespace Database\Seeders;

use App\Importers\DbSinapiImporter;
use Exception;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DbSinapiWithNbrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pathToCsv = \base_path('database/seeders/data/insumos-com-SINAPI-e-NBR.csv');

        if (!\file_exists($pathToCsv)) {
            throw new Exception("File '{$pathToCsv}' does not exists");
        }

        DbSinapiImporter::import($pathToCsv, ';');
    }
}
