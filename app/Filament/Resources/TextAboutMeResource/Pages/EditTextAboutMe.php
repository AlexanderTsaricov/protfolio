<?php

namespace App\Filament\Resources\TextAboutMeResource\Pages;

use App\Filament\Resources\TextAboutMeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTextAboutMe extends EditRecord
{
    protected static string $resource = TextAboutMeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
