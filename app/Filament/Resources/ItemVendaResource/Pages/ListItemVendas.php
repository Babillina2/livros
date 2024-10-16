<?php

namespace App\Filament\Resources\ItemVendaResource\Pages;

use App\Filament\Resources\ItemVendaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListItemVendas extends ListRecords
{
    protected static string $resource = ItemVendaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
