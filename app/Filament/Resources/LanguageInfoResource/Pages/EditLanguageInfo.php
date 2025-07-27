<?php

namespace App\Filament\Resources\LanguageInfoResource\Pages;

use App\Filament\Resources\LanguageInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLanguageInfo extends EditRecord
{
    protected static string $resource = LanguageInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
