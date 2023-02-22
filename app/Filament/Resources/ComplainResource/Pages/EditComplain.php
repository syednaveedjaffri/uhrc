<?php

namespace App\Filament\Resources\ComplainResource\Pages;

use App\Filament\Resources\ComplainResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComplain extends EditRecord
{
    protected static string $resource = ComplainResource::class;

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
        return 'Registered Complain is Updated';
       }
}
