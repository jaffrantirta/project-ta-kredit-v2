<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Queries\UserQuery;

class UserController extends Controller
{
    public function index(UserQuery $userQuery)
    {
        return $userQuery->includes()->filterSortPaginateWithAppend();
    }

    public function store(UserStoreRequest $request)
    {
        return User::create($request->validated());
    }

    public function show($user, UserQuery $query)
    {
        return $query->includes()->findAndAppend($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->noContent();
    }
}
