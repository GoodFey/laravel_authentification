<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public static function login()
    {
        return view('user.login');
    }

    public static function loginAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials, $request->boolean('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->route('user.profile')->with('message', 'Welcome, ' . Auth::user()->name);
        }

        return back()->withErrors([
            'email' => 'Wrong email or password',
        ]);
    }
    public static function logout()
    {
        Auth::logout();
        return view('user.login');
    }

    public static function create()
    {
        return view('user.register');
    }

    public static function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    public static function store(StoreRequest $request)
    {
        $request->validated();

        $user = User::store($request);

        event(new Registered($user));

        Auth::login($user);
        return redirect()->route('verification.notice');
    }
    public static function isAccountVerify()
    {
        return Auth::user()->email_verified_at ? "Verify" : "Not Verify";
    }
}
