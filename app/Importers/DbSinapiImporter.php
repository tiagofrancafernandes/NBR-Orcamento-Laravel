<?php

namespace App\Importers;

use Exception;
use App\Models\Nbr;
use App\Models\Sinapi;
use App\Enums\UnidadeMedidaEnum;
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

        $clearedKeyValue = function (array &$array) {
            foreach ($array as $key => $value) {
                $array[trim("{$key}")] = trim("{$value}");
            }

            // return $array;
        };

        $rows->each(function (array $rowProperties) use ($clearedKeyValue) {
            $clearedKeyValue($rowProperties);
            $rowProperties = (object) $rowProperties;
            $unidadeMedida = UnidadeMedidaEnum::getEnum(\strtolower($rowProperties?->unidade_medida))
                ?: (UnidadeMedidaEnum::getEnum($rowProperties?->unidade_medida) ?? UnidadeMedidaEnum::OTHER);

            if (!$unidadeMedida) {
                throw new \InvalidArgumentException("unidadeMedida [{$unidadeMedida}|{$rowProperties?->unidade_medida}] is invalid");
            }

            $descricaoNbr = $rowProperties?->descricao_nbr;
            $codigoNbr = $rowProperties?->codigo_nbr;

            $nbrs = [];

            if ($descricaoNbr && $codigoNbr) {
                $descricaoNbr = str($rowProperties?->descricao_nbr ?? '')->trim()->explode("\n")->each(fn ($item) => trim($item));
                $codigoNbr = str($rowProperties?->codigo_nbr ?? '')->trim()->explode("\n")->each(fn ($item) => trim($item));
                $combinedNbr = $descricaoNbr->count() === $codigoNbr->count() ? array_combine(
                    $descricaoNbr->toArray(),
                    $codigoNbr->toArray(),
                ) : [];

                if ($combinedNbr) {
                    foreach ($combinedNbr as $_descricaoNbr => $_codigoNbr) {
                        $nbr = Nbr::updateOrCreate([
                            'codigo' => $_codigoNbr,
                        ], [
                            'descricao' => str($_descricaoNbr)->limit(200),
                            'codigo' => $_codigoNbr,
                        ]);

                        $nbrs[] = $nbr;
                    }
                }
            }

            $sinapi = Sinapi::updateOrCreate([
                'codigo' => $rowProperties->codigo,
            ], [
                'descricao' => str($rowProperties->descricao)->limit(200),
                'codigo' => $rowProperties->codigo,
                'custo' => $rowProperties->custo,
                'unidade_medida' => $unidadeMedida,
            ]);

            if ($nbrs) {
                foreach ($nbrs as $_nbr) {
                    // TODO usar mophy to many aqui
                    dd('TODO usar mophy to many aqui'); // TODO

                    // $sinapiHasNbr = SinapiHasNbr::updateOrCreate([
                    //     'codigo_sinapi' => $sinapi?->codigo,
                    //     'codigo_nbr' => $_nbr?->codigo,
                    // ], [
                    //     'codigo_sinapi' => $sinapi?->codigo,
                    //     'codigo_nbr' => $_nbr?->codigo,
                    //     'descricao' => implode('|', [
                    //         "{$_nbr?->codigo} - {$sinapi?->codigo}",
                    //     ]),
                    // ]);
                }
            }
        });

        \dump('Finished at', \now()->format('Y-m-d H:i:s'));
        \dump(\sprintf('Sinapi count: %s', Sinapi::count()));
    }
}
