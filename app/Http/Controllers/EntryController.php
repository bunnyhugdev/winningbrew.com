<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entry;
use App\Repositories\EntryRepository;

use App\Competition;
use App\Repositories\CompetitionRepository;

use App\Style;
use App\Repositories\StyleRepository;

class EntryController extends Controller
{
    protected $competitions;
    protected $entries;
    protected $styles;

    public function __construct(
            EntryRepository $entries,
            CompetitionRepository $comps,
            StyleRepository $styles) {
        $this->middleware('auth');

        $this->entries = $entries;
        $this->competitions = $comps;
        $this->styles = $styles;
    }

    public function index(Request $request) {
        $comp_id = $request->session()->get('competition', null);
        if ($comp_id == null) {
            $request->session()->flash('error', 'Not sure what competition you are trying to enter');
            return redirect('/dashboard');
        }

        $comp = $this->competitions->get($comp_id);
        $styles = $this->styles->getAllStyles();
        return view('entries.index', [
            'entries' => $this->entries->forUser($request->user(), $comp),
            'competition' => $comp,
            'styles' => $styles
        ]);
    }

    public function create(Request $request) {
        $comp_id = $request->session()->get('competition', null);
        if ($comp_id == null) {
            $request->session()->flash('error', 'Not sure what competition you are trying to enter');
            return redirect('/dashboard');
        }

        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->entries()->create([
            'name' => $request->name,
            'competition_id' => $comp_id,
            'style_id' => $request->style
        ]);
        return redirect('/entries');
    }

    public function destroy(Request $request, Entry $entry) {
        $this->authorize('destroy', $entry);

        $entry->delete();

        return redirect('/entries');
    }

    public function competition(Request $request, $id) {
        $request->session()->put('competition', $id);
        return redirect('/entries');
    }
}
