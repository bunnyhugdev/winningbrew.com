<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entry;
use App\Repositories\EntryRepository;

class EntryController extends Controller
{

    protected $entries;

    public function __construct(EntryRepository $entries) {
        $this->middleware('auth');

        $this->entries = $entries;
    }

    public function index(Request $request) {
        $entries = $this->entries->forUser($request->user());

        return view('entries.index', [
            'entries' => $entries,
        ]);
    }

    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->entries()->create([
            'name' => $request->name,
        ]);
        return redirect('/entries');
    }

    public function destroy(Request $request, Entry $entry) {
        $this->authorize('destroy', $entry);

        $entry->delete();

        return redirect('/entries');
    }
}
