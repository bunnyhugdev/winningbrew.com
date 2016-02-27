<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Competition;
use App\Repositories\CompetitionRepository;

class DashboardController extends Controller
{
    protected $competitions;

    public function __construct(CompetitionRepository $comps) {
        $this->middleware('auth');
        $this->competitions = $comps;
    }

    public function index(Request $request) {

        return view('dashboard.index', [
            'upcoming' => $this->competitions->upcoming()
        ]);
    }
}