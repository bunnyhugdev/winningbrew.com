<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Competition;
use App\Repositories\CompetitionRepository;

class ResultsController extends Controller
{
    protected $competitions;

    public function __construct(CompetitionRepository $competitions) {
        $this->competitions = $competitions;
    }

    public function results(Request $request, Competition $competition) {
        if (null == $request->user() || !policy($competition)->admin($request->user(), $competition)) {
            if (!isset($competition->finalized) || ($competition->finalized > time())) {
                return redirect('/');
            }
        }

        return view('competitions.results', [
            'winners' => $this->competitions->winners($competition),
            'competition' => $competition
        ]);
    }
}
