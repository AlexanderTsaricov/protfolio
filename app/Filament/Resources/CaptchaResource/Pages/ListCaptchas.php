<?php

namespace App\Filament\Resources\CaptchaResource\Pages;

use App\Filament\Resources\CaptchaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCaptchas extends ListRecords
{
    protected static string $resource = CaptchaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
