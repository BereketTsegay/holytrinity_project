<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration page.
     */
    public function create(): Response
    {
        return Inertia::render('auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'address' => ['required'],
            'gender' => ['required'],
            'tele' => ['required'],
        ]);
        $user = new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->address=$request->address;
        $user->tele=$request->tele;
        $user->gender=$request->gender;
        $user->password=Hash::make($request->password);
        
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return to_route('dashboard');
    }
}
