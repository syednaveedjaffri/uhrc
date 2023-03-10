<?php

namespace App\Filament\Resources\ComplainResource\Pages;

use App\Filament\Resources\ComplainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateComplain extends CreateRecord
{
    protected static string $resource = ComplainResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Complain is Registered';
    }
}
