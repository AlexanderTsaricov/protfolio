<?php

namespace App\Filament\Resources\TextAboutMeResource\Pages;

use App\Filament\Resources\TextAboutMeResource;
use App\Models\TextAboutMe;
use App\Services\TextAboutMeService;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTextAboutMe extends CreateRecord
{
    private ?TextAboutMeService $service = null;

    protected static string $resource = TextAboutMeResource::class;

    private function getService() {
        if ($this->service == null) {
            $this->service = new TextAboutMeService();
        }
        return $this->service;
    }

    protected function handleRecordCreation(array $data): TextAboutMe
    {
        $this->getService();
        $newTextAboutMe = $this->service->add($data['name'], $data['text'], $data['type'], $data['subtype']);
        return $newTextAboutMe;
    }
}
