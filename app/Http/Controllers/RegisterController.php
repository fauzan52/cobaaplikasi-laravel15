<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view ('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function save(Request $request)
    {

        $save = $request->validate([
            'name' => 'required|min:3|max:255|unique:users|',
            'username' => 'required|min:3|max:255|unique:users|',
            'email' => 'required|min:3|max:255|unique:users|email:dns',
            'password' => 'required|min:3|max:255',
        ]);

        $save['password'] = Hash::make($save['password']);

        User::create($save);

        $request->session()->flash('success', 'Registration Successful');

        return redirect ('/login');
    }
}
