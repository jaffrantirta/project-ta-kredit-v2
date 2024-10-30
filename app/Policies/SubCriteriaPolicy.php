<?php

namespace App\Policies;

use App\Models\SubCriteria;
use App\Models\User;

class SubCriteriaPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('subcriteria.viewAny');
    }

    public function view(User $user, SubCriteria $subcriteria)
    {
        return $user->can('subcriteria.view');
    }

    public function create(User $user)
    {
        return $user->can('subcriteria.create');
    }

    public function update(User $user, SubCriteria $subcriteria)
    {
        return $user->can('subcriteria.update');
    }

    public function delete(User $user, SubCriteria $subcriteria)
    {
        return $user->can('subcriteria.delete');
    }
}
