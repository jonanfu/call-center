<?php

namespace App\Policies;

use App\User;
use App\Llamada;
use Illuminate\Auth\Access\HandlesAuthorization;

class LlamadasPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function pass(User $user, Llamada $llamada){
        return $user -> id === $llamada -> user_id;
    }
}
