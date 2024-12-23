<?php

namespace App\Filament\Resources\OrderDiterimaResource\Pages;

use App\Filament\Resources\OrderDiterimaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderDiterima extends EditRecord
{
    protected static string $resource = OrderDiterimaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
