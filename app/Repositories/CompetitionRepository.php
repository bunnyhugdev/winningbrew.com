<?php

namespace App\Repositories;

use App\Competition;
use App\Entry;
use App\Payment;
use App\Style;

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
            ->select('styles.id', 'styles.subcategory', 'styles.subcategory_name',
                DB::raw('count(entries.id) as total'), DB::raw('sum(entries.received) as received'))
            ->where('entries.competition_id', '=', $competition->id)
            ->groupBy('styles.id')
            ->get();
    }

    public function entriesByJudgingCategories(Competition $competition) {
        return DB::table('entries')
            ->join('judging_category_mappings', 'judging_category_mappings.style_id', '=', 'entries.style_id')
            ->join('judging_categories', 'judging_categories.id', '=', 'judging_category_mappings.judging_category_id')
            ->select('judging_categories.ordinal', 'judging_categories.name', DB::raw('count(entries.id) as total'))
            ->where([
                ['entries.competition_id', $competition->id],
                ['judging_categories.judging_guide_id', $competition->judging_guide_id]
            ])
            ->groupBy('judging_categories.ordinal', 'judging_categories.name')
            ->orderBy('judging_categories.sort_order')
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

    public function entriesForStyle(Competition $competition, Style $style) {
        return DB::table('entries')
            ->join('styles', 'entries.style_id', '=', 'styles.id')
            ->where([
                'competition_id' => $competition->id,
                'style_id' => $style->id
            ])
            ->orderBy('label')
            ->get();
    }
}
