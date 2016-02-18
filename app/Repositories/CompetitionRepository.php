<?php

namespace App\Repositories;

use App\Competition;

class CompetitionRepository {
    public function upcoming() {
        return Competition::where('entry_close', '>=', date('Y-m-d'))
            ->orderBy('entry_close', 'asc')
            ->get();
    }

    public function get($id) {
        return Competition::where('id', $id)->first();
    }
}
