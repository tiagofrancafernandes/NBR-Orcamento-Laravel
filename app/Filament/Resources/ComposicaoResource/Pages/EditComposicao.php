<?php

namespace App\Filament\Resources\ComposicaoResource\Pages;

use App\Filament\Resources\ComposicaoResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComposicao extends EditRecord
{
    protected static string $resource = ComposicaoResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
