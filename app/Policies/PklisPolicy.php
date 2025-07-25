<?php

namespace App\Policies;

use App\Models\Pklis;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PklisPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_pklis');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pklis $pklis): bool
    {
        return $user->can('view_pklis');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_pklis');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pklis $pklis): bool
    {
        return $user->can('update_pklis');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pklis $pklis): bool
    {
        return $user->can('delete_pklis');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pklis $pklis): bool
    {
        return $user->can('restore_pklis');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pklis $pklis): bool
    {
        return $user->can('force_delete_pklis');
    }
}