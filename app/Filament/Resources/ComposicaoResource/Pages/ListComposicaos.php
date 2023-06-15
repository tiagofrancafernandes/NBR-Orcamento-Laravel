<?php

namespace App\Filament\Resources\ComposicaoResource\Pages;

use App\Filament\Resources\ComposicaoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComposicaos extends ListRecords
{
    protected static string $resource = ComposicaoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
