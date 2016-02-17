<?php

namespace App\Repositories;

use App\Competition;

class CompetitionRepository {
    public function upcoming() {
        Competition::where('entry_close', '>=', date('Y-m-d'))
            ->orderBy('entry_close', 'asc')
            ->get();
    }
}
