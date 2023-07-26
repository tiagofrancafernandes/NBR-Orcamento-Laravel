<?php

namespace App\Filament\Resources\SinapiResource\Pages;

use App\Filament\Resources\SinapiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSinapi extends EditRecord
{
    protected static string $resource = SinapiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
