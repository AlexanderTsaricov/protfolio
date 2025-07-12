<?php

namespace App\Filament\Resources\BlokedMailsResource\Pages;

use App\Filament\Resources\BlokedMailsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlokedMails extends EditRecord
{
    protected static string $resource = BlokedMailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
