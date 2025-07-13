<?php

namespace App\Reposotories\Blocked;

use App\Models\BlockedMail;
use Illuminate\Database\Eloquent\Collection;

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

    public function add(string $email): void
    {
        $newBlockedEmail = new BlockedMail();
        $newBlockedEmail->email = $email;
        $newBlockedEmail->save();
    }
}
