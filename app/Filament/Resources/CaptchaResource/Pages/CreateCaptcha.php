<?php

namespace App\Filament\Resources\CaptchaResource\Pages;

use App\Filament\Resources\CaptchaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCaptcha extends CreateRecord
{
    protected static string $resource = CaptchaResource::class;
}
