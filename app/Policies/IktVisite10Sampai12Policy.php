<?php

namespace App\Policies;

use App\Models\IktVisite10Sampai12;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IktVisite10Sampai12Policy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, IktVisite10Sampai12 $iktVisite10Sampai12): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, IktVisite10Sampai12 $iktVisite10Sampai12): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, IktVisite10Sampai12 $iktVisite10Sampai12): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, IktVisite10Sampai12 $iktVisite10Sampai12): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, IktVisite10Sampai12 $iktVisite10Sampai12): bool
    {
        //
    }
}
