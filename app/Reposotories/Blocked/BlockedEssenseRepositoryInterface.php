<?php

namespace App\Reposotories\Blocked;

use App\Models\BlockedEssence;
use Illuminate\Database\Eloquent\Collection;

interface BlockedEssenseRepositoryInterface
{
    /**
     * Returns all blocked emails
     * @return array
     */
    public function all(): Collection;

    /**
     * Return true if exsists blocked email in storage or return false
     * @return bool
     */
    public function exists(string $essenseName): bool;

    /**
     * Return blocked email object by email string
     * @param string $email
     * @return 
     */
    public function get(string $essenseName): ?BlockedEssence;

    /**
     * Delete blocked email from database
     * @param string $email
     */
    public function remove(string $essenseName);

    /**
     * Add email to blocked emails storage
     * @param string $email
     */
    public function add(string $essenseName);
}
