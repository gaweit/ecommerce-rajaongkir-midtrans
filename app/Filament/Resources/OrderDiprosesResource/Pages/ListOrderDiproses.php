<?php

namespace App\Filament\Resources\OrderDiprosesResource\Pages;

use App\Filament\Resources\OrderDiprosesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderDiproses extends ListRecords
{
    protected static string $resource = OrderDiprosesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
