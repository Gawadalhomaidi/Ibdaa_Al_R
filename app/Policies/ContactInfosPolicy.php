<?php

namespace App\Policies;

use App\Models\ContactInfos;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ContactInfosPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Manager Contact Infos')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('View Contact Infos')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Create Contact Infos')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Update Contact Infos')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        if ($user->hasRole(['administrator', 'editor']) || $user->hasPermissionTo('Delete Contact Infos')) {
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
