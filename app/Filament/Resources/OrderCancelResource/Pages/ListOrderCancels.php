<?php

namespace App\Filament\Resources\OrderCancelResource\Pages;

use App\Filament\Resources\OrderCancelResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrderCancels extends ListRecords
{
    protected static string $resource = OrderCancelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
