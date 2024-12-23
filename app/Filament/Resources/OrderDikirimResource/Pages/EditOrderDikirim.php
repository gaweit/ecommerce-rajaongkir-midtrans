<?php

namespace App\Filament\Resources\OrderDikirimResource\Pages;

use App\Filament\Resources\OrderDikirimResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderDikirim extends EditRecord
{
    protected static string $resource = OrderDikirimResource::class;

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
