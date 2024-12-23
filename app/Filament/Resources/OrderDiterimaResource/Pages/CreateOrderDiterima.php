<?php

namespace App\Filament\Resources\OrderDiterimaResource\Pages;

use App\Filament\Resources\OrderDiterimaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateOrderDiterima extends CreateRecord
{
    protected static string $resource = OrderDiterimaResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
