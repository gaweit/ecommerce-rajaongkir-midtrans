<?php

namespace App\Filament\Resources\OrderDiterimaResource\Pages;

use App\Filament\Resources\OrderDiterimaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderDiterimas extends ListRecords
{
    protected static string $resource = OrderDiterimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
