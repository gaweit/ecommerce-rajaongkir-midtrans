<?php

namespace App\Filament\Resources\KotaResource\Pages;

use App\Filament\Resources\KotaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKota extends CreateRecord
{
    protected static string $resource = KotaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
