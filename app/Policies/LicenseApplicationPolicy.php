<?php

namespace App\Policies;

use App\Models\LicenseApplication;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class LicenseApplicationPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin ): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return in_array($admin->role, ['superadmin', 'moderator']);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin ): bool
    {
        return in_array($admin->role, ['superadmin', 'moderator']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin ): bool
    {
        return $admin->role === 'superadmin';
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin ): bool
    {
        return in_array($admin->role, ['superadmin', 'moderator']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin ): bool
    {
        return $admin->role === 'superadmin';
    }

    public function approve(Admin $admin): bool
    {
        return in_array($admin->role, ['moderator', 'superadmin']);
    }

    public function reject(Admin $admin): bool
    {
        return in_array($admin->role, ['moderator', 'superadmin']);
    }
}
