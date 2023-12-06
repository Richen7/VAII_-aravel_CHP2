<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function registration(Request $request) {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:15', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:250']
            ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::query()->create($incomingFields);

        auth()->login($user);

        return redirect('/');
    }



    public function login(Request $request) {
        $incominFields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);

        if (auth()->attempt(['name' => $incominFields['loginname'], 'password' => $incominFields['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

}

