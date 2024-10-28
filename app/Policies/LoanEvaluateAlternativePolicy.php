<?php

namespace App\Policies;

use App\Models\LoanEvaluateAlternative;
use App\Models\User;

class LoanEvaluateAlternativePolicy
{
    public function viewAny(User $user)
    {
        return $user->can('loanevaluatealternative.viewAny');
    }

    public function view(User $user, LoanEvaluateAlternative $loanevaluatealternative)
    {
        return $user->can('loanevaluatealternative.view');
    }

    public function create(User $user)
    {
        return $user->can('loanevaluatealternative.create');
    }

    public function update(User $user, LoanEvaluateAlternative $loanevaluatealternative)
    {
        return $user->can('loanevaluatealternative.update');
    }

    public function delete(User $user, LoanEvaluateAlternative $loanevaluatealternative)
    {
        return $user->can('loanevaluatealternative.delete');
    }
}
