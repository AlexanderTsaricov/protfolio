<?php

namespace App\Filament\Resources\BlokedMailResource\Pages;

use App\Filament\Resources\BlokedMailResource;
use App\Models\BlockedMail;
use App\Reposotories\Blocked\BlockedMailRepository;
use App\Services\BlockedMailService;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

use function Laravel\Prompts\alert;

class EditBlokedMail extends EditRecord
{
    protected static string $resource = BlokedMailResource::class;

    private ?BlockedMailService $blockedMailService = null;
    private ?BlockedMailRepository $blockedMailRepository = null;

    protected function getBlockedMailService(): BlockedMailService
    {
        if ($this->blockedMailService === null) {
            $this->blockedMailRepository = new BlockedMailRepository();
            $this->blockedMailService = new BlockedMailService($this->blockedMailRepository);
        }
        return $this->blockedMailService;
    }


    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $this->getBlockedMailService();
        if (!$this->blockedMailService->isBlocked($record->email)) {
            Notification::make()
                ->title('Этот email не заблокирован, редактирование невозможно.')
                ->danger()
                ->send();

            return $record;
        } else {
            $editBlockedEmail = $this->blockedMailService->edit($record, $data['email']);
            return $editBlockedEmail;
        }
    }

    protected function handleRecordDeletion(Model $record)
    {
        $this->getBlockedMailService();
        $this->blockedMailService->unblock($record->email);
        return $record;
    }
}
