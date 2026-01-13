<?php

namespace App\Policies;

use App\Models\License;
use App\Models\Admin;
use Illuminate\Auth\Access\Response;

class LicensePolicy
{
    /**
     * Determine whether the Admin can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return true;
    }

    /**
     * Determine whether the Admin can view the model.
     */
    public function view(Admin $admin): bool
    {
        return true;
    }

    /**
     * Determine whether the Admin can create models.
     */
    public function create(Admin $admin): bool
    {
        return in_array($admin->role, ['superadmin', 'moderator']);
    }

    /**
     * Determine whether the Admin can update the model.
     */
    public function update(Admin $admin): bool
    {
        return in_array($admin->role, ['superadmin', 'moderator']);
    }

    /**
     * Determine whether the Admin can delete the model.
     */
    public function delete(Admin $admin): bool
    {
        return $admin->role === 'superadmin';
    }

    /**
     * Determine whether the Admin can restore the model.
     */
    public function restore(Admin $admin): bool
    {
        return in_array($admin->role, ['superadmin', 'moderator']);
    }

    /**
     * Determine whether the Admin can permanently delete the model.
     */
    public function forceDelete(Admin $admin): bool
    {
        return in_array($admin->role, ['superadmin', 'moderator']);
    }

    public function approve(Admin $admin): bool
    {
        return $admin->role === 'superadmin';
    }

    public function reject(Admin $admin): bool
    {
        return in_array($admin->role, ['moderator', 'superadmin']);
    }
}
