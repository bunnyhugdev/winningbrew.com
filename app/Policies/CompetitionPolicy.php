<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\User;
use App\Competition;

class CompetitionPolicy
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

    public function before($user, $ability) {
        if ($user->isSuperAdmin()) {
            return true;
        }
    }

    public function admin(User $user, Competition $competition) {
        return $user->isCompetitionAdmin($competition);
    }
}
