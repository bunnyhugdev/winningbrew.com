<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Competition;
use App\Repositories\CompetitionRepository;

use App\Style;
use App\Entry;

class CompetitionController extends Controller
{
    protected $competitions;

    public function __construct(CompetitionRepository $competitions) {
        $this->middleware('auth');

        $this->competitions = $competitions;
    }

    public function index(Request $request) {
        $competitions = $this->competitions->upcoming();

        return view('competitions.index', [
            'competitions' => $competitions
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $request->user()->competitions()->create([
            'name' => $request->name,
            'description' => $request->description,
            'rules' => $request->rules,
            'entry_open' => $request->entry_open,
            'entry_close' => $request->entry_close,
            'judge_start' => $request->judge_start,
            'judge_end' => $request->judge_end,
            'result_at' => $request->result_at,
            'ship_address1' => $request->ship_address1,
            'ship_address2' => $request->ship_address2,
            'ship_city' => $request->ship_city,
            'ship_province' => $request->ship_province,
            'ship_postal_code' => $request->ship_postal_code,
        ]);

        return redirect('/competitions');
    }

    public function admin(Request $request, Competition $competition) {
        $this->authorize('admin', $competition);

        return view('competitions.admin', [
            'competition' => $competition,
            'entriesByEntryCategory' => $this->competitions->entriesByEntryCategory($competition),
            'totalCount' => $this->competitions->totalEntries($competition),
            'totalFees' => $this->competitions->totalFees($competition),
            'entrantsByClub' => $this->competitions->entrantsByClub($competition),
            'entriesByClub' => $this->competitions->entriesByClub($competition),
            'entriesByJudgingCategory' => $this->competitions->entriesByJudgingCategories($competition)
        ]);
    }

    public function receive_info(Request $request, Competition $competition) {
        $this->authorize('admin', $competition);

        return view('competitions.receive', [
            'competition' => $competition,
            'entriesByEntryCategory' => $this->competitions->entriesByEntryCategory($competition)
        ]);
    }

    public function receive_style(Request $request, Competition $competition, Style $style) {
        $this->authorize('admin', $competition);
        return view('competitions.receive-style', [
            'competition' => $competition,
            'style' => $style,
            'entries' => $this->competitions->entriesForStyle($competition, $style)
        ]);
    }

    public function receive_entry(Request $request, Entry $entry) {
        $this->authorize('admin', $entry->competition);
        $entry->update([
            'received' => $request->received
        ]);
        //return redirect('/competition/receive/' . $entry->competition->id . '/' . $entry->style->id);
        return response()->json(['status' => 'success', 'received' => $request->received]);
    }

    public function receive_comment(Request $request, Entry $entry) {
        $this->authorize('admin', $entry->competition);
        $entry->update([
            'received_comments' => $request->comment
        ]);
        return response()->json(['status' => 'success', 'comment' => $request->comment]);
    }

    public function receive_sheets(Request $request, Competition $competition) {
        $this->authorize('admin', $competition);
        $all_entries = [];
        foreach ($competition->guide->styles as $style) {
            $all_entries[$style->subcategory . '-' . $style->subcategory_name] = $this->competitions->entriesForStyle($competition, $style);
        }
        return view('competitions.receive-sheets', [
            'allEntries' => $all_entries,
            'competition' => $competition
        ]);
    }

    public function pull_sheets(Request $request, Competition $competition) {
        $this->authorize('admin', $competition);
        $all_entries = [];
        foreach ($competition->judgingGuide->categories as $category) {
            $all_entries[$category->ordinal . '-' . $category->name] =
                $this->competitions->entriesForCategory($competition, $category);
        }
        return view('competitions.pull-sheets', [
            'allEntries' => $all_entries,
            'competition' => $competition
        ]);
    }
}
