<?php

namespace App\Filament\Resources\EkspedisiResource\Pages;

use App\Filament\Resources\EkspedisiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEkspedisi extends EditRecord
{
    protected static string $resource = EkspedisiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
