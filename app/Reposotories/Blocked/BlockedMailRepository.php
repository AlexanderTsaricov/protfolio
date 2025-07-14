<?php

namespace App\Reposotories\Blocked;

use App\Models\BlockedMail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BlockedMailRepository implements BlockedEssenseRepositoryInterface
{
    public function all(): Collection
    {
        $blockedEmails = BlockedMail::all();
        return $blockedEmails;
    }

    public function exists(string $email): bool
    {
        return BlockedMail::where('email', $email)->exists();
    }

    public function get(string $email): BlockedMail
    {
        $blockedEmail = BlockedMail::where('email', $email)->first();
        return $blockedEmail;
    }

    public function remove(string $email): void
    {
        $blockedEmail = BlockedMail::where('email', $email)->first();
        $blockedEmail->delete();
    }

    public function add(string $email): BlockedMail
    {
        $newBlockedEmail = new BlockedMail();
        $newBlockedEmail->email = $email;
        $newBlockedEmail->save();
        return $newBlockedEmail;
    }

    public function edit(Model $blockedMail, string $email): Model
    {
        $blockedMail->email = $email;
        $blockedMail->save();
        return $blockedMail;
    }
}
