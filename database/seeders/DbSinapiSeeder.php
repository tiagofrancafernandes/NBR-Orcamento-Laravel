<?php

namespace Database\Seeders;

use App\Importers\DbSinapiImporter;
use Exception;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DbSinapiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pathToCsv = \base_path('database/seeders/data/db-sinapi.csv');

        if (!\file_exists($pathToCsv)) {
            throw new Exception("File '{$pathToCsv}' does not exists");
        }

        DbSinapiImporter::import($pathToCsv, ';');
    }
}
