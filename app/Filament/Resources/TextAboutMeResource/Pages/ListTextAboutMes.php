<?php

namespace App\Filament\Resources\TextAboutMeResource\Pages;

use App\Filament\Resources\TextAboutMeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTextAboutMes extends ListRecords
{
    protected static string $resource = TextAboutMeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
