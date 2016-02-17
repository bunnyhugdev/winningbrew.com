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
        $comp = new Competition;
        $comp->name = $request->name;
        $comp->description = $request->description;
        $comp->rules = $request->rules;
        $comp->entry_open = $request->entry_open;
        $comp->entry_close = $request->entry_close;
        $comp->judge_start = $request->judge_start;
        $comp->judge_end = $request->judge_end;
        $comp->result_at = $request->result_at;
        $comp->ship_address1 = $request->ship_address1;
        $comp->ship_address2 = $request->ship_address2;
        $comp->ship_city = $request->ship_city;
        $comp->ship_province = $request->ship_province;
        $comp->ship_postal_code = $request->ship_postal_code;

        $comp->save();

        return redirect('/competitions');
    }
}
