<?php

namespace App\Repositories;

use App\Competition;
use App\Entry;
use App\Payment;

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

    public function totalEntries(Competition $competition) {
        return Entry::where('competition_id', $competition->id)
            ->count();
    }

    public function totalFees(Competition $competition) {
        return Payment::where('competition_id', $competition->id)->sum('amount');
    }

    public function entrantsByClub(Competition $competition) {
        return DB::table('entries')
            ->join('users', 'entries.user_id', '=', 'users.id')
            ->join('clubs', 'users.club_id', '=', 'clubs.id')
            ->select('clubs.name', DB::raw('count(distinct users.id) as userCount'))
            ->where('entries.competition_id', '=', $competition->id)
            ->groupBy('clubs.name')
            ->get();
    }

    public function entriesByClub(Competition $competition) {
        return DB::table('entries')
            ->join('users', 'entries.user_id', '=', 'users.id')
            ->join('clubs', 'users.club_id', '=', 'clubs.id')
            ->select('clubs.name', DB::raw('count(entries.id) as entryCount'))
            ->where('entries.competition_id', '=', $competition->id)
            ->groupBy('clubs.name')
            ->get();
    }
}
