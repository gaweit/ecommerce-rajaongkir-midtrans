<?php

namespace App\Filament\Resources\MedsosResource\Pages;

use App\Filament\Resources\MedsosResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMedsos extends CreateRecord
{
    protected static string $resource = MedsosResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
