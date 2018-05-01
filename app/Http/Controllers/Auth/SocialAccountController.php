<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classes\SocialAccountsService;

class SocialAccountController extends Controller
{
    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(SocialAccountsService $accountService, $provider) {
        \Log::info('handling Callback');
        try {
            $user = Socialite::with($provider)->user();
        } catch (Exception $e) {
            \Log::error('Error in callback. ' . $e->getMessage());
            return redirect('/login');
        }

        $authUser = $accountService->findOrCreate($user, $provider);
        auth()->login($authUser, true);
        return redirect()->to('/home');
    }
}
