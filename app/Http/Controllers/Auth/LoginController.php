<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Two\InvalidStateException;

class LoginController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (InvalidStateException $e) {
            $user = Socialite::driver('github')->stateless()->user();
        }
        $role = Role::where('slug', 'MBR')->first();

        $user = User::firstOrNew([
            'email' => $user->getEmail()
        ], [
            'name' => $user->getNickname(),
            'fullname' => $user->getName(),
            'email' => $user->getEmail(),
            'password' => bcrypt($user->getId()),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);

        // Add role_id to user
        $role->users()->save($user);

        Auth::login($user, true);
        return redirect()->route('homepage');
    }
}
