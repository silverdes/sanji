<?php

namespace App\Policies;

use App\Models\User;
use App\Models\odel=User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=User  $odel=User
     * @return mixed
     */
    public function view(User $user, odel=User $odel=User)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=User  $odel=User
     * @return mixed
     */
    public function update(User $user, odel=User $odel=User)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=User  $odel=User
     * @return mixed
     */
    public function delete(User $user, odel=User $odel=User)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=User  $odel=User
     * @return mixed
     */
    public function restore(User $user, odel=User $odel=User)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\odel=User  $odel=User
     * @return mixed
     */
    public function forceDelete(User $user, odel=User $odel=User)
    {
        //
    }
}
