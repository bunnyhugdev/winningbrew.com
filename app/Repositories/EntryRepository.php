<?php

namespace App\Repositories;

use App\User;
use App\Entry;
use App\Competition;

class EntryRepository {

    public function forUser(User $user, Competition $competition) {
        return Entry::where([
                ['user_id', $user->id],
                ['competition_id', $competition->id]
            ])
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
