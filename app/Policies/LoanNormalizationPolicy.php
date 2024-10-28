<?php

namespace App\Policies;

use App\Models\LoanNormalization;
use App\Models\User;

class LoanNormalizationPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('loannormalization.viewAny');
    }

    public function view(User $user, LoanNormalization $loannormalization)
    {
        return $user->can('loannormalization.view');
    }

    public function create(User $user)
    {
        return $user->can('loannormalization.create');
    }

    public function update(User $user, LoanNormalization $loannormalization)
    {
        return $user->can('loannormalization.update');
    }

    public function delete(User $user, LoanNormalization $loannormalization)
    {
        return $user->can('loannormalization.delete');
    }
}
