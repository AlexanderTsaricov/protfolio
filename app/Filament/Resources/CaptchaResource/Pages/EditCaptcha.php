<?php

namespace App\Filament\Resources\CaptchaResource\Pages;

use App\Filament\Resources\CaptchaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaptcha extends EditRecord
{
    protected static string $resource = CaptchaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
