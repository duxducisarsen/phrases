<?php

namespace DuxDucisArsen\Phrases\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use DuxDucisArsen\Phrases\Models\Phrase;

class PhrasePolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Phrase $phrase)
    {
        return $user->id == $phrase->created_by;
    }


    public function edit(User $user, Phrase $phrase )
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

}
