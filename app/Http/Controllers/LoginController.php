<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function index()
   {
       return view ('login.index', [
           'title' => 'login',
           'active' => 'login'
           ]);
   }

   public function verification(Request $request)
   {
        $cre= $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($cre)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('login_error','Login failed | Email or password is wrong !!!');
   }

   public function logout (Request $request)
   {
       Auth::logout();

       $request->session()->invalidate();

       $request->session()->regenerateToken();

       return redirect('/');
   }


}
