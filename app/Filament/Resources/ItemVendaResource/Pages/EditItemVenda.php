<?php

namespace App\Filament\Resources\ItemVendaResource\Pages;

use App\Filament\Resources\ItemVendaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditItemVenda extends EditRecord
{
    protected static string $resource = ItemVendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
