<?php

namespace App\Filament\Resources\OrderPendingResource\Pages;

use App\Filament\Resources\OrderPendingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderPending extends EditRecord
{
    protected static string $resource = OrderPendingResource::class;

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
