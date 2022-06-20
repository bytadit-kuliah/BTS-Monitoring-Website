<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(User $user)
    {
        $user = Auth::user();
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        if(Auth::user()->email == request('email')) {

        $this->validate(request(), [
              //  'email' => 'required|email|unique:users',
                // 'password' => 'required|min:6|confirmed',
                // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
                'firstName' => 'required|max:255',
                'lastName' => 'required|max:255',
                // 'email' => 'required|unique:users|email',
                'noTelp' => 'required',
                // 'password' => 'required',
                'alamat' => 'required',
                'photo' => 'max:2048'
            ]);

            $user->firstName = request('firstName');
            $user->lastName = request('lastName');
            $user->noTelp = request('noTelp');
            $user->alamat = request('alamat');

           // $user->email = request('email');
            // $user->password = bcrypt(request('password'));
            $user->save();
            return back();

        }
        else{

        $this->validate(request(), [
                'name' => 'required',
                //'email' => 'required|email|unique:users',
                'email' => 'email|required|unique:users,email,'.$this->segment(2),
                'password' => 'required|min:5|confirmed'
            ]);

            $user->username = request('username');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();

        }
    }
}
