<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vaga;
use Illuminate\Auth\Access\Response;

class VagaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vaga $vaga): bool
    {
        if($user->tipoUsuario ==='admin'){
            return true;
        }
         return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if($user->tipoUsuario ==='admin'){
            return true;
        }
         return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vaga $vaga): bool
    {
        if($user->tipoUsuario ==='admin'){
            return true;
        }
         return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vaga $vaga): bool
    {
        if($user->tipoUsuario ==='admin'){
            return true;
        }
         return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vaga $vaga)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vaga $vaga)
    {
        //
    }
}
