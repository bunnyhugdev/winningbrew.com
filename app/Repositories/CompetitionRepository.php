<?php

namespace App\Repositories;

use App\Competition;
use App\Entry;

use DB;

class CompetitionRepository {
    public function upcoming() {
        return Competition::where('entry_close', '>=', date('Y-m-d'))
            ->orderBy('entry_close', 'asc')
            ->get();
    }

    public function get($id) {
        return Competition::where('id', $id)->first();
    }

    public function entriesByEntryCategory(Competition $competition) {
        return DB::table('entries')
            ->join('styles', 'styles.id', '=', 'entries.style_id')
            ->select('styles.id', 'styles.subcategory', 'styles.subcategory_name', DB::raw('count(entries.id) as total'))
            ->where('entries.competition_id', '=', $competition->id)
            ->groupBy('styles.id')
            ->get();
    }
}
