<?php

namespace App\Filament\Resources\LanguageInfoResource\Pages;

use App\Filament\Resources\LanguageInfoResource;
use App\Models\LanguageInfo;
use App\Services\LanguageInfoService;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLanguageInfos extends ListRecords
{
    protected static string $resource = LanguageInfoResource::class;
    protected ?LanguageInfoService $service = null;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getService()
    {
        if ($this->service == null) {
            $this->service = new LanguageInfoService();
        }
    }

    protected function resolveRecord($key): LanguageInfo
    {
        $this->getService();
        $this->logger($key, 'id');
        return $this->service->get($key);
    }
}
