<?php

namespace App\Policies;

use App\Models\Features;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FeaturesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Manager Features')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('View Features')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Create Features')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Update Features')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Delete Features')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        return false;
    }
}
