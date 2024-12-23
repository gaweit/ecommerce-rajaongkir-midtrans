<?php

namespace App\Filament\Resources\OrderPendingResource\Pages;

use App\Filament\Resources\OrderPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderPendings extends ListRecords
{
    protected static string $resource = OrderPendingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
