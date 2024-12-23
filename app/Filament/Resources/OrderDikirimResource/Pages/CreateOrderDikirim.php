<?php

namespace App\Filament\Resources\OrderDikirimResource\Pages;

use App\Filament\Resources\OrderDikirimResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderDikirim extends CreateRecord
{
    protected static string $resource = OrderDikirimResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
