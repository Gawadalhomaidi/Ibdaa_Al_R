<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Values;
use Illuminate\Auth\Access\Response;

class ValuesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Manager Values')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('View Values')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Create Values')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Update Values')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Delete Values')) {
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
