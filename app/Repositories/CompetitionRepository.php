<?php

namespace App\Repositories;

use App\Competition;
use App\Entry;
use App\Payment;
use App\Style;
use App\JudgingCategory;

use DB;

class CompetitionRepository {
    public function upcoming() {
        return Competition::where('result_at', '>=', date('Y-m-d'))
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
            ->select('entries.*', 'styles.subcategory', 'styles.subcategory_name')
            ->where([
                'competition_id' => $competition->id,
                'style_id' => $style->id
            ])
            ->orderBy('label')
            ->get();
    }

    public function entriesForCategory(Competition $competition, JudgingCategory $category) {
        return DB::table('entries')
            ->join('judging_category_mappings', 'entries.style_id', '=', 'judging_category_mappings.style_id')
            ->join('judging_categories', 'judging_category_mappings.judging_category_id', '=', 'judging_categories.id')
            ->join('styles', 'entries.style_id', '=', 'styles.id')
            ->select('entries.*', 'judging_categories.ordinal', 'judging_categories.name', 'styles.subcategory')
            ->where([
                ['entries.competition_id', $competition->id],
                ['judging_categories.id',  $category->id],
                ['entries.received', '>', 0]
            ])
            ->orderBy('judging_category_mappings.sort_order', 'asc')
            ->orderBy('entries.label')
            ->get();
    }

    public function userEntryXref(Competition $competition, JudgingCategory $category) {
        return DB::table('entries')
            ->join('judging_category_mappings', 'entries.style_id', '=', 'judging_category_mappings.style_id')
            ->join('judging_categories', 'judging_category_mappings.judging_category_id', '=', 'judging_categories.id')
            ->join('styles', 'entries.style_id', '=', 'styles.id')
            ->join('users', 'entries.user_id', '=', 'users.id')
            ->select('entries.*', 'users.email', 'users.first_name', 'users.last_name', 'judging_categories.ordinal', 'judging_categories.name', 'styles.subcategory')
            ->where([
                ['entries.competition_id', $competition->id],
                ['judging_categories.id',  $category->id],
                ['entries.received', '>', 0]
            ])
            ->orderBy('judging_category_mappings.sort_order', 'asc')
            ->orderBy('entries.label')
            ->get();
    }

    public function userEntries(Competition $competition) {
        $entries = DB::table('users')
            ->join('entries', 'users.id', '=', 'entries.user_id')
            ->join('styles', 'entries.style_id', '=', 'styles.id')
            ->select('users.email', 'users.first_name', 'users.last_name', 'entries.*', 'styles.subcategory')
            ->where([
                ['entries.competition_id', $competition->id],
                ['entries.received', '>', 0]
            ])
            ->orderBy('entries.label')
            ->get();

        $userXref = [];

        foreach ($entries as $entry) {
            if (!isset($userXref[$entry->email])) {
                $userXref[$entry->email] = ['name' => $entry->last_name . ', ' . $entry->first_name, 'entries' => []];
            }
            $userXref[$entry->email]['entries'][$entry->id] = $entry;
        }
        return $userXref;
    }

    
}
