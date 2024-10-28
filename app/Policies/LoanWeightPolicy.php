<?php

namespace App\Policies;

use App\Models\LoanWeight;
use App\Models\User;

class LoanWeightPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('loanweight.viewAny');
    }

    public function view(User $user, LoanWeight $loanweight)
    {
        return $user->can('loanweight.view');
    }

    public function create(User $user)
    {
        return $user->can('loanweight.create');
    }

    public function update(User $user, LoanWeight $loanweight)
    {
        return $user->can('loanweight.update');
    }

    public function delete(User $user, LoanWeight $loanweight)
    {
        return $user->can('loanweight.delete');
    }
}
