<?php

namespace App\Policies;

use App\Models\Complain;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ComplainPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        // return auth()->user($user);
        return $user->hasRole(['super-admin','admin','moderator']);

        // if($user->hasPermissionTo('create: permission'));
        // return true;
        // {
        //     return false;
        // }    ITS WORKING
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Complain $complain)
    {

    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        // return auth()->user($user);
        return $user->hasRole(['super-admin','admin']);
        // if($user->hasPermissionTo('read: permission'));
        // return true;
        // {
        //     return false;
        // }  OK HAE
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Complain $complain)
    {
        return $user->hasRole(['super-admin','admin']);

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Complain $complain)
    {
        return $user->hasRole(['super-admin','admin']);

    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Complain $complain)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Complain  $complain
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Complain $complain)
    {
        //
    }
}
