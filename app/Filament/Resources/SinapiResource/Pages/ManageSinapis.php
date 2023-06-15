<?php

namespace App\Filament\Resources\SinapiResource\Pages;

use App\Filament\Resources\SinapiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSinapis extends ManageRecords
{
    protected static string $resource = SinapiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
