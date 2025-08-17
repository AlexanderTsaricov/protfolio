<?php

namespace App\Filament\Resources\TextAboutMeResource\Pages;

use App\Filament\Resources\TextAboutMeResource;
use App\Services\TextAboutMeService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditTextAboutMe extends EditRecord
{
    private ?TextAboutMeService $service = null;

    protected static string $resource = TextAboutMeResource::class;

    private function getService()
    {
        if ($this->service == null) {
            $this->service = new TextAboutMeService();
        }
        return $this->service;
    }

    protected function handleRecordUpdate(Model $record, array $data):Model {
        $name = $record->name;
        if (!$this->service->has($name)) {
            Notification::make()
                ->title('Этот текст не существует, редактирование невозможно.')
                ->danger()
                ->send();

            return $record;  
        }

        $this->getService();
        $parameter = $data['parameter'];
        $changedData = $data['changedData'];

        $editedText = $this->service->edit($name, $parameter, $changedData);
        return $editedText;
    }

    protected function handleRecordDeletion(Model $record):Model {
        $name = $record->name;
        if (!$this->service->has($name)) {
            Notification::make()
                ->title('Этот текст не существует, редактирование невозможно.')
                ->danger()
                ->send();

            return $record;  
        }

        $this->getService();

        $this->service->delete($record->getName());
        return $record;
    }
}


