<?php

namespace App\Policies;

use App\Models\Infrastructure;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfrastructurePolicy
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
        return $user->hasPermissionTo('infrastructure read');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Infrastructure $infrastructure)
    {
        return $user->hasPermissionTo('infrastructure read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('infrastructure create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Infrastructure $infrastructure)
    {
        return $user->hasPermissionTo('infrastructure update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Infrastructure $infrastructure)
    {
        return $user->hasPermissionTo('infrastructure delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Infrastructure $infrastructure)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Infrastructure $infrastructure)
    {
        //
    }
}
