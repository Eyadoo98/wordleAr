<?php

namespace App\Http\Controllers\WordleAr;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    public function redirectToFacebook(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleGoogleCallback(): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Socialite::driver('google')->user();
            $findUser = User::query()->where('social_id', $user->id)->first();
            if ($findUser) {
                auth()->login($findUser);
                return redirect()->route('main');
            } else {
                $newUser = User::query()->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => Hash::make('123456789'),
                ]);
                auth()->login($newUser);
                return redirect()->route('main');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function handleFacebookCallback(): \Illuminate\Http\RedirectResponse
    {
        try {
            $user = Socialite::driver('faceboook')->user();
            $findUser = User::query()->where('social_id', $user->id)->first();
            if ($findUser) {
                auth()->login($findUser);
                return redirect()->route('home');
            } else {
                $newUser = User::query()->create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id' => $user->id,
                    'social_type' => 'facebook',
                    'password' => Hash::make('123456789'),
                ]);
                auth()->login($newUser);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function authSocialite()
    {
        return view('partials.WordleAr.auth-socialite');
    }

    public function authLogin(Request $request)
    {

        $email = $request->email;
        $password = $request->password;
        $findUser = User::query()->where('email', $email)->first();
        if ($findUser) {
            Auth::attempt(['email' => $email, 'password' => $password]);
        } else {
            $newUser = User::query()->create([
                'name' => Str::random(10),
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            Auth::attempt(['email' => $email, 'password' => $password]);
        }
        return true;
    }
}
