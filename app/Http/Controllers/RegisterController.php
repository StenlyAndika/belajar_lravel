<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => ['required', 'min:3', 'unique:users'], //find if username is registered in users table
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:3']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect('/login')->with('isRegistered', 'user registered successfully!');
    }
}
