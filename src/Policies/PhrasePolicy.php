<?php

namespace DuxDucisArsen\Phrases\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;

class PhrasePolicy
{
    use HandlesAuthorization;
    use AccessPolicies;


    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user)
    {
        return true;
    }

    public function delete(User $user)
    {
        return false;
    }

    public function createOrEdit(User $user)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

}
