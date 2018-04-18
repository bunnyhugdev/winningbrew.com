<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Competition;
use App\Repositories\CompetitionRepository;

class DashboardController extends Controller
{
    protected $competitions;

    public function __construct(CompetitionRepository $comps) {
        $this->competitions = $comps;
    }

    public function index(Request $request) {
        $user = Auth::user();
        $past = $user ? $this->competitions->adminOfPast($user) : null;
        return view('dashboard.index', [
            'upcoming' => $this->competitions->upcoming(),
            'past' => $past
        ]);
    }
}
