<?php

namespace App\Filament\Resources\KotaResource\Pages;

use App\Filament\Resources\KotaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKota extends EditRecord
{
    protected static string $resource = KotaResource::class;

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
