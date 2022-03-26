<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function before($user, $ability)
    {
        return $user->hasRole('Super-Admin') ? true : null;
    }

    public function edit(User $authUser, User $user)
    {
        /** Usuario autenticado, usuario en la bd */
        return $authUser->id === $user->id;
    }

    public function update(User $authUser, User $user)
    {
        /** Usuario autenticado, usuario en la bd */
        return $authUser->id === $user->id;
    }

    public function delete ($user, $ability) {
        return $user->hasPermission('delete_users') ? true : null;
    }
}
