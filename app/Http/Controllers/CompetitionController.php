<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Competition;
use App\Repositories\CompetitionRepository;

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
            'entriesByClub' => $this->competitions->entriesByClub($competition)
        ]);
    }
}
