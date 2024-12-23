<?php

namespace App\Filament\Resources\OrderDiprosesResource\Pages;

use App\Filament\Resources\OrderDiprosesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderDiproses extends EditRecord
{
    protected static string $resource = OrderDiprosesResource::class;

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
