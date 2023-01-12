<?php

namespace App\Filament\Resources\LabResource\Pages;

use App\Filament\Resources\LabResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLabs extends ListRecords
{
    protected static string $resource = LabResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
