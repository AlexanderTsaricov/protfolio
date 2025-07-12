<?php

namespace App\Filament\Resources\BlokedMailResource\Pages;

use App\Filament\Resources\BlokedMailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlokedMail extends EditRecord
{
    protected static string $resource = BlokedMailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
