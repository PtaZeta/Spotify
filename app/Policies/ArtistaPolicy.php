<?php

namespace App\Policies;

use App\Models\Artista;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArtistaPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Artista $artista): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Artista $artista): Response
    {
        return $user->name == 'admin'
            ? Response::allow()
            : Response::deny("El usuario no es el creador de la imagen.");
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Artista $artista): Response
    {
        return $user->name == 'admin' || $artista->users->contains($user)
            ? Response::allow()
            : Response::deny("El usuario no es el creador de la imagen.");
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Artista $artista): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Artista $artista): bool
    {
        return false;
    }
}
