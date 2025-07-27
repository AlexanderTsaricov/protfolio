<?php

namespace App\Filament\Resources\LanguageInfoResource\Pages;

use App\Filament\Resources\LanguageInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLanguageInfos extends ListRecords
{
    protected static string $resource = LanguageInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
