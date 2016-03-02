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

    public function findUniqueLabel(Competition $competition) {
        $counter = 0;

        while ($counter < 100) {
            $lbl = rand(0, 9999);
            $count = Entry::where([
                ['competition_id', $competition->id],
                ['label', $lbl]
            ])->count();
            if ($count === 0) {
                return $lbl;
            }
            $counter++;
        }
    }
}
