<?php

namespace App\Importers;

use App\Enums\UnidadeMedidaEnum;
use App\Models\Sinapi;
use Exception;
use Spatie\SimpleExcel\SimpleExcelReader;

class DbSinapiImporter
{
    /**
     * function running
     *
     * @param string $pathToFile
     * @param ?string $delimiter
     *
     * @return void
     */
    public static function import(string $pathToFile, ?string $delimiter = \null): void
    {
        if (!\file_exists($pathToFile)) {
            throw new Exception("File '{$pathToFile}' does not exists");
        }

        /**
         * @var $reader SimpleExcelReader
         */
        $reader = SimpleExcelReader::create($pathToFile);

        if ($delimiter) {
            $reader = $reader->useDelimiter($delimiter);
        }

        /**
         * @var $rows Illuminate\Support\LazyCollection
         */
        $rows = $reader->getRows();

        \dump('Started at', \now()->format('Y-m-d H:i:s'));
        \dump(\sprintf('Sinapi count: %s', Sinapi::count()));

        $rows->each(function (array $rowProperties) {
            $rowProperties = (object) $rowProperties;
            $unidadeMedida = UnidadeMedidaEnum::getEnum(\strtolower($rowProperties->unidade_medida))
                ?: UnidadeMedidaEnum::getEnum($rowProperties->unidade_medida);

            if (!$unidadeMedida) {
                throw new \InvalidArgumentException('unidadeMedida is invalid ');
            }

            Sinapi::updateOrCreate([
                'codigo' => $rowProperties->codigo_sinapi,
            ], [
                'descricao' => $rowProperties->descricao_sinapi,
                'codigo' => $rowProperties->codigo_sinapi,
                'custo' => $rowProperties->custo,
                'unidade_medida' => $unidadeMedida,
            ]);
        });

        \dump('Finished at', \now()->format('Y-m-d H:i:s'));
        \dump(\sprintf('Sinapi count: %s', Sinapi::count()));
    }
}
