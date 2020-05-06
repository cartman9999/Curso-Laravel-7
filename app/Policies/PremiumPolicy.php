<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PremiumPolicy
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

    /**
     *
     * @param
     * @return
     */
    public function view(User $user)
    {
        // dd($user);
        // if($user->role_id == 1) {
        //     dd('premium');
        // } else {
        //     dd('no');
        // }
        return $user->role_id == 1;
    }

    public function isSuperAdmin(User $user)
    {
        return $user->role_id == 1;
    }
}
