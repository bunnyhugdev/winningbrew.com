<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Competition;
use App\Repositories\CompetitionRepository;

use Log;

class ResultsController extends Controller
{
    protected $competitions;

    public function __construct(CompetitionRepository $competitions) {
        $this->competitions = $competitions;
    }

    public function results(Request $request, Competition $competition) {
        if (null == $request->user() || !policy($competition)->admin($request->user(), $competition)) {
            if (!isset($competition->finalized) || (strtotime($competition->finalized) > time())) {
                return redirect('/');
            }
        }
        $winners = $this->competitions->winners($competition);

        $coty = [];
        $boty = [];

        foreach ($winners as $category) {
            Log::info($category->first_fname);
            Log::info($category->first_lname);
            Log::info($category->first_id);
            // gold
            $this->addOtyPts($category->first_club_name, $coty, 'G');
            $this->addOtyPts($category->first_id, $boty, 'G', $category->first_fname . ' ' . $category->first_lname);

            // silver
            $this->addOtyPts($category->second_club_name, $coty, 'S');
            $this->addOtyPts($category->second_id, $boty, 'S', $category->second_fname . ' ' . $category->second_lname);

            // bronze
            $this->addOtyPts($category->third_club_name, $coty, 'B');
            $this->addOtyPts($category->third_id, $boty, 'B', $category->third_fname . ' ' . $category->third_lname);

        }
        //Log::info($boty);
        $this->totalOty($coty);
        $this->totalOty($boty);

        uasort($coty, array($this, 'cmpOty'));
        uasort($boty, array($this, 'cmpOty'));

        return view('competitions.results', [
            'winners' => $winners,
            'competition' => $competition,
            'coty' => $coty,
            'boty' => $boty
        ]);
    }

    protected function totalOty(&$oty) {
        foreach($oty as $key => $medals) {
            $tots = ($medals['G'] * 3) +
                    ($medals['S'] * 2) +
                    ($medals['B']);
            $medals['total'] = $tots;
            $oty[$key] = $medals;
        }

    }

    protected function cmpOty($a, $b) {
        if ($a['total'] === $b['total']) {
            if ($a['G'] === $b['G']) {
                if ($a['S'] === $b['S']) {
                    if ($a['B'] === $b['B']) {
                        return 0;
                    }
                    return ($a['B'] < $b['B']) ? 1 : -1;
                }
                return ($a['S'] < $b['S']) ? 1 : -1;
            }
            return ($a['G'] < $b['G']) ? 1 : -1;
        }
        return ($a['total'] < $b['total']) ? 1 : -1;
    }

    protected function addOtyPts($identifier, &$standings, $place, $name = null) {
        if (!isset($standings[$identifier])) {
            $standings[$identifier] = [
                'G' => 0,
                'S' => 0,
                'B' => 0,
                'total' => 0,
                'name' => $name
            ];
        }
        $standings[$identifier][$place] += 1;
    }
}
