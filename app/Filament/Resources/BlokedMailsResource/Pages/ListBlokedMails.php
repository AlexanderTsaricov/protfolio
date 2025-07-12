<?php

namespace App\Filament\Resources\BlokedMailsResource\Pages;

use App\Filament\Resources\BlokedMailsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlokedMails extends ListRecords
{
    protected static string $resource = BlokedMailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
