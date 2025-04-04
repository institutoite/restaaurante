<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;


use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('view permissions');
    }

    public function view(User $user, Permission $permission): bool
    {
        return $user->hasPermissionTo('view permissions');
    }

    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create permissions');
    }

    public function update(User $user, Permission $permission): bool
    {
        return $user->hasPermissionTo('edit permissions');
    }

    public function delete(User $user, Permission $permission): bool
    {
        return $user->hasPermissionTo('delete permissions');
    }
}
