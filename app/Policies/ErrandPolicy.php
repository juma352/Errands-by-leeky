<?php

namespace App\Policies;

use App\Models\Errand;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ErrandPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }
    public function viewAnyCustomer(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Errand $errand): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return  $user->employer === null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Errand $errand): bool|Response
    {
        if ($errand->customer->user_id === $user->id) {
            return false;
            
        }
        if($errand->errandApplication()->count()> 0) {
           return Response::deny('Cannot cahge the errands with applications');
        }
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Errand $errand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Errand $errand): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Errand $errand): bool
    {
        //
    }
    public function apply(USer $user, Errand $errand): bool
    {

        return  !$errand->hasUserApplied($user);
    }
}
