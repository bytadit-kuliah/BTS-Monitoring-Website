<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // dd('Berhasil Login');

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            // $request->session()->flash('success', 'Login Success');
            // $admin = DB::table('users')->where('username', 'like', '%'. 'admin'. '%');
            $email = $request->email;
            // dd($request->email);
            // $surveyor = DB::table('users')->where('username', 'like', '%'. 'surveyor'. '%');
            if(str_contains($email, 'surveyor')){
                return redirect()->intended('/surveyor');
            }else if(str_contains($email, 'admin')){
                return redirect()->intended('/admin');
            }
        }

        return back()->with('loginError', 'Login Failed!');


        // dd('berhasil login');
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
