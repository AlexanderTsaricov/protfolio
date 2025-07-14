<?php

namespace App\Services;

use App\Exeptions\AlredyBlockedExeption;
use App\Exeptions\NotBlockedExeption;
use App\Reposotories\Blocked\BlockedEssenseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BlockedMailService implements BlockedEssenceServiceInterface
{
    private BlockedEssenseRepositoryInterface $blockedMailRepository;

    public function __construct(BlockedEssenseRepositoryInterface $blockedMailRepository)
    {
        $this->blockedMailRepository = $blockedMailRepository;
    }

    public function block(string $email)
    {
        if ($this->blockedMailRepository->exists($email)) {
            throw new AlredyBlockedExeption();
        }

        $newBlockedMail = $this->blockedMailRepository->add($email);
        return $newBlockedMail;
    }

    public function unblock(string $email): void
    {
        if (!$this->blockedMailRepository->exists($email)) {
            throw new NotBlockedExeption();
        }

        $this->blockedMailRepository->remove($email);
    }

    public function isBlocked(string $email): bool
    {
        return $this->blockedMailRepository->exists($email);
    }

    public function edit(Model $model, string $name): Model
    {
        if (!$this->blockedMailRepository->exists($model->email)) {
            throw new NotBlockedExeption();
        }

        $model->email = $name;
        $model->save();

        return $model;
    }
}
