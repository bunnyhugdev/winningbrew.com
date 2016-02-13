<?php

namespace App\Repositories;

use App\User;
use App\Entry;

class EntryRepository {

    public function forUser(User $user) {
        return Entry::where('user_id', $user->id)
            ->orderBy('created_at', 'asc')
            ->get();
    }
}
