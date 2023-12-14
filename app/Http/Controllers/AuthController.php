<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index_login(){
        return view('dash.login');
    }

    public function auth_login(){
        $credentials = request()->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
 
            return redirect()->intended(route('dashboard'));
        }

        return back()->with('login_error' , 'Login Failed');
    }

    public function abort(){
        return abort(404);
    }

    public function auth_logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect()->route('login');
    }

    public function changepw(Request $request){
        $validated = $request->validate([
            'password' => 'required',
        ]);
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
