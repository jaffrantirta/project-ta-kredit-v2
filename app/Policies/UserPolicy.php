<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any users.
     */
    public function viewAny(User $user)
    {
        return $user->can('user.viewAny');
    }

    /**
     * Determine whether the user can view a specific user.
     */
    public function view(User $user, User $targetUser)
    {
        return $user->can('user.view');
    }

    /**
     * Determine whether the user can create users.
     */
    public function create(User $user)
    {
        return $user->can('user.create');
    }

    /**
     * Determine whether the user can update a specific user.
     */
    public function update(User $user, User $targetUser)
    {
        return $user->can('user.update');
    }

    /**
     * Determine whether the user can delete a specific user.
     */
    public function delete(User $user, User $targetUser)
    {
        return $user->can('user.delete');
    }
}
