<?php

namespace App\Filament\Resources\OrderCancelResource\Pages;

use App\Filament\Resources\OrderCancelResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditOrderCancel extends EditRecord
{
    protected static string $resource = OrderCancelResource::class;

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
