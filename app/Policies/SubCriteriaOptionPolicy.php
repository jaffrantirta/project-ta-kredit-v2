<?php

namespace App\Policies;

use App\Models\SubCriteriaOption;
use App\Models\User;

class SubCriteriaOptionPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('subcriteriaoption.viewAny');
    }

    public function view(User $user, SubCriteriaOption $subcriteriaoption)
    {
        return $user->can('subcriteriaoption.view');
    }

    public function create(User $user)
    {
        return $user->can('subcriteriaoption.create');
    }

    public function update(User $user, SubCriteriaOption $subcriteriaoption)
    {
        return $user->can('subcriteriaoption.update');
    }

    public function delete(User $user, SubCriteriaOption $subcriteriaoption)
    {
        return $user->can('subcriteriaoption.delete');
    }
}
