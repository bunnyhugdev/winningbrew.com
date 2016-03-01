<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function profile(Request $request, User $user) {
        $this->authorize('profile', $user);
        return view('users.profile', [
            'user' => $user
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

        $user->save();

        $request->session()->flash('success', 'Your information has been updated');

        return redirect('/profile/' . $user->id);
    }
}
