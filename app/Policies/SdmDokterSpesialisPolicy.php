<?php

namespace App\Policies;

use App\Models\SdmDokterSpesialis;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SdmDokterSpesialisPolicy
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
    public function view(User $user, SdmDokterSpesialis $sdmDokterSpesialis): bool
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
    public function update(User $user, SdmDokterSpesialis $sdmDokterSpesialis): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SdmDokterSpesialis $sdmDokterSpesialis): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SdmDokterSpesialis $sdmDokterSpesialis): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SdmDokterSpesialis $sdmDokterSpesialis): bool
    {
        //
    }
}
