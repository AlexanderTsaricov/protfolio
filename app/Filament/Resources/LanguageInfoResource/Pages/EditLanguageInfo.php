<?php

namespace App\Filament\Resources\LanguageInfoResource\Pages;

use App\Filament\Resources\LanguageInfoResource;
use App\Models\LanguageInfo;
use App\Services\LanguageInfoService;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Filament\Notifications\Notification;


class EditLanguageInfo extends EditRecord
{
    protected ?LanguageInfoService $service = null;
    protected static string $resource = LanguageInfoResource::class;
    protected function getService()
    {
        if ($this->service == null) {
            $this->service = new LanguageInfoService();
        }
    }

    protected function handleRecordUpdate(Model $record, array $data): LanguageInfo
    {
        $this->getService();
        $changedProperty = $data['changedArg'] ?? '';
        $propertyName = $data['changedArgName'] ?? '';

        $updateLanguageInfo = $this->service->edit($record->name, $changedProperty, $propertyName);
        $this->record = $updateLanguageInfo;
        /** @var LanguageInfo $newLanguageInfo */
        return $updateLanguageInfo;
    }

    protected function handleRecordDeletion(Model $record): LanguageInfo
    {
        $this->getService();
        $deleted = $this->service->get($record->name);
        $this->service->remove($record->name);
        return $deleted;
    }

    protected function resolveRecord($key): LanguageInfo
    {
        $this->getService();
        return $this->service->get($key);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->record]);
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        foreach (['name', 'text', 'type'] as $field) {
            if ($this->record->{$field} !== $data[$field]) {
                $data['changedArgName'] = $field;
                $data['changedArg'] = $data[$field];
                break;
            }
        }

        return $data;
    }
}
