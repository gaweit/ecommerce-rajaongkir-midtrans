<?php

namespace App\Filament\Resources\OrderDiprosesResource\Pages;

use App\Filament\Resources\OrderDiprosesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderDiproses extends CreateRecord
{
    protected static string $resource = OrderDiprosesResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
