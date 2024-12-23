<?php

namespace App\Filament\Resources\OrderPendingResource\Pages;

use App\Filament\Resources\OrderPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderPending extends CreateRecord
{
    protected static string $resource = OrderPendingResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
