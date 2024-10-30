<?php

namespace App\Policies;

use App\Models\LoanApplicationScore;
use App\Models\User;

class LoanApplicationScorePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('loanapplicationscore.viewAny');
    }

    public function view(User $user, LoanApplicationScore $loanapplicationscore)
    {
        return $user->can('loanapplicationscore.view');
    }

    public function create(User $user)
    {
        return $user->can('loanapplicationscore.create');
    }

    public function update(User $user, LoanApplicationScore $loanapplicationscore)
    {
        return $user->can('loanapplicationscore.update');
    }

    public function delete(User $user, LoanApplicationScore $loanapplicationscore)
    {
        return $user->can('loanapplicationscore.delete');
    }
}
