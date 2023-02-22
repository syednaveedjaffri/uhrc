<?php

namespace App\Filament\Resources\QueryResource\Pages;

use App\Filament\Resources\QueryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditQuery extends EditRecord
{
    protected static string $resource = QueryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Query is Updated';
    }
}
