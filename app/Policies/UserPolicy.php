<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view users');
    }

    public function view(User $user, User $model): bool
    {
        return $user->can('view users') || $user->id === $model->id;
    }

    public function create(User $user): bool
    {
        return $user->can('create users');
    }

    public function update(User $user, User $model): bool
    {
        // Solo admin o el mismo usuario puede editar
        return $user->can('edit users') || $user->id === $model->id;
    }

    public function delete(User $user, User $model): bool
    {
        // No permitir auto-eliminación
        if ($user->id === $model->id) {
            return false;
        }
        return $user->can('delete users');
    }

    public function restore(User $user, User $model): bool
    {
        return $user->can('restore users');
    }

    public function forceDelete(User $user, User $model): bool
    {
        return $user->can('force delete users');
    }

    public function assignRole(User $user): bool
    {
        return $user->can('assign roles');
    }

    public function assignBranch(User $user): bool
    {
        return $user->can('assign branches');
    }
}
