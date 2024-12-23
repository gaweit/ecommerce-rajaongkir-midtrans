<?php

namespace App\Filament\Resources\OrderCancelResource\Pages;

use App\Filament\Resources\OrderCancelResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderCancel extends CreateRecord
{
    protected static string $resource = OrderCancelResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
