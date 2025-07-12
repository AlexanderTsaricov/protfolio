<?php

namespace App\Filament\Resources\BlokedMailResource\Pages;

use App\Filament\Resources\BlokedMailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlokedMails extends ListRecords
{
    protected static string $resource = BlokedMailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
