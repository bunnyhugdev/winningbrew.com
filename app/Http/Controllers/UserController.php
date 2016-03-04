<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Club;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function profile(Request $request, User $user) {
        $this->authorize('profile', $user);

        return view('users.profile', [
            'user' => $user,
            'clubs' => Club::all()
        ]);
    }

    public function update(Request $request, User $user) {
        $this->authorize('update', $user);

        $user->name = $request->name;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->province = $request->province;
        $user->postal_code = $request->postal_code;
        $user->accept_communication = $request->accept_communication;
        $user->club_id = $request->club == "" ? null : $request->club;

        $user->save();

        $request->session()->flash('success', 'Your information has been updated');

        return redirect('/profile/' . $user->id);
    }
}
