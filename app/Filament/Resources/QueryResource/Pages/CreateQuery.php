<?php

namespace App\Filament\Resources\QueryResource\Pages;

use App\Filament\Resources\QueryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateQuery extends CreateRecord
{
    protected static string $resource = QueryResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Your Query is submitted successfully';
    }
}
