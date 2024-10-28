<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;

class LoanPolicy
{
    public function viewAny(User $user)
    {
        return $user->can('loan.viewAny');
    }

    public function view(User $user, Loan $loan)
    {
        return $user->can('loan.view');
    }

    public function create(User $user)
    {
        return $user->can('loan.create');
    }

    public function update(User $user, Loan $loan)
    {
        return $user->can('loan.update');
    }

    public function delete(User $user, Loan $loan)
    {
        return $user->can('loan.delete');
    }
}
