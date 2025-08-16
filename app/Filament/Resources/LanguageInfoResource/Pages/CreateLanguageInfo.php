<?php

namespace App\Filament\Resources\LanguageInfoResource\Pages;

use App\Filament\Resources\LanguageInfoResource;
use App\Models\LanguageInfo;
use App\Services\LanguageInfoService;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLanguageInfo extends CreateRecord
{
    protected ?LanguageInfoService $service = null;
    protected static string $resource = LanguageInfoResource::class;
    protected function getService()
    {
        if ($this->service == null) {
            $this->service = new LanguageInfoService();
        }
    }

    protected function handleRecordCreation(array $data): LanguageInfo
    {
        $this->getService();
        $name = $data['name'] ?? '';
        $type = $data['type'] ?? '';
        $text = $data['text'] ?? null;

        $newLanguageInfo = $this->service->add($name, $type, $text);
        /** @var LanguageInfo $newLanguageInfo */
        return $newLanguageInfo;
    }
}
