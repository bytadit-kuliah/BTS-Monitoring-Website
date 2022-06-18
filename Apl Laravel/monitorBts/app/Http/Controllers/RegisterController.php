<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }
    public function store(Request $request){
        // return $request->all();
        // return view('register.index', [
        //     'title' => 'Register',
        //     'active' => 'register'
        // ]);

        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            // 'email' => 'required|email:dns|unique:users',
            'email' => 'required|unique:users',
            'noTelp' => 'required',
            'password' => 'required|confirmed|min:5|max:255',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        // $request->session()->flash('success', 'Registration Successfull!! Please Login');
        return redirect('/login')->with('success', 'Registration Successfull!! Please Login');
    }
}
