<?php

namespace App\Filament\Resources\BlokedMailResource\Pages;

use App\Filament\Resources\BlokedMailResource;
use App\Models\BlockedMail;
use App\Reposotories\Blocked\BlockedMailRepository;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Services\BlockedMailService;
use Illuminate\Database\Eloquent\Model;

class CreateBlokedMail extends CreateRecord
{
    private ?BlockedMailService $blockedMailService = null;
    private ?BlockedMailRepository $blockedMailRepository = null;
    protected static string $resource = BlokedMailResource::class;

    protected function getBlockedMailService(): BlockedMailService
    {
        if ($this->blockedMailService === null) {
            $this->blockedMailRepository = new BlockedMailRepository();
            $this->blockedMailService = new BlockedMailService($this->blockedMailRepository);
        }
        return $this->blockedMailService;
    }

    protected function handleRecordCreation(array $data): BlockedMail
    {
        $this->getBlockedMailService();
        $email = $data['email'];
        $newBlockedEmail = $this->blockedMailService->block($email);
        return $newBlockedEmail;
    }
}
