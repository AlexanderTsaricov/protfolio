<?php

namespace App\Services;

interface BlockedEssenceServiceInterface
{
    public function block(string $essenceName): void;
    public function unblock(string $essenceName): void;
    public function isBlocked(string $essenceName): bool;
}
