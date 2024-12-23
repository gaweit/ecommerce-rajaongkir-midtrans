<?php

namespace App\Filament\Resources\OrderDikirimResource\Pages;

use App\Filament\Resources\OrderDikirimResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderDikirims extends ListRecords
{
    protected static string $resource = OrderDikirimResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
