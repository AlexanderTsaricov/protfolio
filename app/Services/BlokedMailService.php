<?php

namespace App\Services;

use App\Exeptions\AlredyBlockedExeption;
use App\Exeptions\NotBlockedExeption;
use App\Reposotories\Blocked\BlockedEssenseRepositoryInterface;

class BlokedMailService implements BlockedEssenceServiceInterface
{
    private BlockedEssenseRepositoryInterface $blockedMailRepository;

    public function __construct(BlockedEssenseRepositoryInterface $blockedMailRepository)
    {
        $this->blockedMailRepository = $blockedMailRepository;
    }

    public function block(string $email): void
    {
        if ($this->blockedMailRepository->exists($email)) {
            throw new AlredyBlockedExeption();
        }

        $this->blockedMailRepository->add($email);
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
}
