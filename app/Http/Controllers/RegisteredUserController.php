<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $userAttributes = request()->validate([
            'name' => ['required'],
            'email'      => ['required', 'email'],
            'password'   => ['required', Password::min(6), 'confirmed']
        ]);

        $employerAttributes = request()->validate([
            'employer' => ['required'],
        ]);

        $user = User::create($userAttributes);

        $user->employer()->create([
            'name' => $employerAttributes['employer'],
        ]);

        Auth::login($user);

        return redirect('/jobs');
    }
}
