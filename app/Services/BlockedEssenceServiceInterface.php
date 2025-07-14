<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;

interface BlockedEssenceServiceInterface
{
    public function block(string $essenceName);
    public function unblock(string $essenceName): void;
    public function isBlocked(string $essenceName): bool;

    public function edit(Model $model, string $name): Model;
}
