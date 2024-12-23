<?php

namespace App\Filament\Resources\MedsosResource\Pages;

use App\Filament\Resources\MedsosResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedsos extends EditRecord
{
    protected static string $resource = MedsosResource::class;

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
