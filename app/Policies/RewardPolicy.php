<?php

namespace App\Policies;

use App\Models\Reward;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RewardPolicy
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
        return $user->hasPermissionTo('reward read');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Reward $reward)
    {
        return $user->hasPermissionTo('reward read');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('reward create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Reward $reward)
    {
        return $user->hasPermissionTo('reward update');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Reward $reward)
    {
        return $user->hasPermissionTo('reward delete');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Grievance  $grievance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Reward $reward)
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
    public function forceDelete(User $user, Reward $reward)
    {
        //
    }
}
