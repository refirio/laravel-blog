<?php

namespace App\Policies;

use App\DataAccess\Eloquent\User;
use App\DataAccess\Eloquent\Entry;
use Illuminate\Auth\Access\HandlesAuthorization;

class EntryPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * @param User  $user
     * @param Entry $entry
     *
     * @return bool
     */
    public function update(User $user, Entry $entry)
    {
        return $user->id === (int)$entry->user_id;
    }
}
