<?php

namespace App\Filament\Resources\NbrResource\Pages;

use App\Filament\Resources\NbrResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageNbrs extends ManageRecords
{
    protected static string $resource = NbrResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
