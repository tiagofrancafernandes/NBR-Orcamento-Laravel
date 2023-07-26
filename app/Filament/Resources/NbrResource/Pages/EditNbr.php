<?php

namespace App\Filament\Resources\NbrResource\Pages;

use App\Filament\Resources\NbrResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNbr extends EditRecord
{
    protected static string $resource = NbrResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
