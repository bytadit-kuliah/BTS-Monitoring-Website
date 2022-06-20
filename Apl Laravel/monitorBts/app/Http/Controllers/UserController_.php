<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Surveyor;
use App\Models\Btslist;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index', [
            'users' => User::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.profile.create', [
            'users' => User::all()
        ]);
    }
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'firstName' => 'required|max:255',
        //     'lastName' => 'required|max:255',
        //     'email' => 'required|unique:users|email',
        //     'noTelp' => 'required',
        //     'alamat' => 'required',
        //     'photo' => 'max:2048'
        // ]);

        // if($request->file('photo')){
        //     $validatedData['photo'] = $request->file('photo')->store('users-photo');
        // }

        // // $validatedData['user_id'] = auth()->user()->id;
        // // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        // User::create($validatedData);

        $validatedData = $request->validate([
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'noTelp' => 'required',
            'alamat' => 'required',
            'password' => 'required|confirmed|min:5|max:255',
            'photo' => 'max:2048'
        ]);

         // password is form field

        $validatedData['password'] = Hash::make($validatedData['password']);

        if($request->file('photo')){
            $validatedData['photo'] = $request->file('photo')->store('users-photo');
        }

        User::create($validatedData);

        return redirect('/dashboard/users')->with('success', 'New User has been added');

    }
    public function show(User $user)
    {

    }
    public function edit(User $user, Request $request)
    {
        return view('dashboard.profile.edit', [
            'user' => $user,
            'users' => User::all(),
            // 'user' => $request->user()
        ]);

    }

    // public function edit(Request $request)
    // {
    //             /**
    //      * Show the update profile page.
    //      *
    //      * @param  Request $request
    //      * @return \Illuminate\Contracts\Support\Renderable
    //      */

    //     return view('dashboard.profile.edit', [
    //         // 'user' => $user,
    //         'users' => User::all(),
    //         'user' => $request->user()
    //     ]);

    // }

    public function update(Request $request, User $user)
    {
        $rules = [
            // 'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'username' => ['required', 'min:3', 'max:255'],
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            // 'email' => 'required|unique:users|email',
            'email' => 'required',
            'noTelp' => 'required',
            'alamat' => 'required',
            'photo' => 'required_without:oldPhoto'
        ];
        // $rules = [
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'firstName' => 'required|max:255',
        //     'lastName' => '',
        //     'email' => '',
        //     'noTelp' => '',
        //     'password' => '',
        //     'alamat' => '',
        //     'photo' => 'max:2048'
        // ];

        $validatedData = $request->validate($rules);

        if($request->file('photo')){
            if($request->oldPhoto){
                Storage::delete($request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('users-photo');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        User::where('id', $user->id)->update($validatedData);


        // $user = User::findOrFail($id);

        // $this->validate($request, [
        //     'username' => ['required', 'min:3', 'max:255', 'unique:users'],
        //     'firstName' => 'required|max:255',
        //     'lastName' => 'required|max:255',
        //     'email' => 'required|unique:users|email',
        //     'noTelp' => 'required',
        //     'alamat' => 'required',
        //     'photo' => 'required_without:oldPhoto'

        // ]);

        // $input = $request->all();
        // $user->fill($input)->save();

        // if($request->file('photo')){
        //     if($request->oldPhoto){
        //         Storage::delete($request->oldPhoto);
        //     }
        //     $image = new User;
        //     $image->photo = $request->file('photo')->store('users-photo');
        //     $image->save();
        // }

        return redirect('/dashboard/users')->with('success', 'Data berhasil diupdate');
    }
    public function destroy(User $user)
    {
        if($user->foto){
            Storage::delete($user->photo);
        }
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'Surveyor has been deleted');
    }




}
