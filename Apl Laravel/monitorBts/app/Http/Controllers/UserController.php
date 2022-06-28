<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Surveyor;
use App\Models\Btslist;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.profile.index', [
            'users' => User::all(),
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.profile.create', [
            'users' => User::all(),
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.profile.show', [
            'user' => $user,
            'users' => User::all(),
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.profile.edit', [
            'user' => $user,
            'users' => User::all(),
            'configs' => Config::all()->first(),
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
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
            // 'password' => 'required|confirmed|min:5|max:255',
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
        // if($request->currentPassword){
        // $passes = Hash::check($request->currentPassword, auth()->user()->password);
        // // if($passes){
        //     $request->validate([
        //         'currentPassword' => ['max:255', $passes],
        //         'newPassword' => ['required_with:currentPassword'],
        //         'confirmNew' => ['same:new_password'],
        //     ]);
        //     $validatedData['password'] = Hash::make($request->newPassword);
        // // }
        // }


        // $user = Auth::user();

        if($request->current_password){

            $userPassword = $user->password;

            if (!Hash::check($request->current_password, $userPassword)) {
                return back()->withErrors(['current_password'=>'password not match']);
            }

            $request->validate([
                'current_password' => 'min:5',
                'password' => 'required_with:current_password',
                'confirm_password' => 'same:password',
            ]);

            $user->password = Hash::make($request->password);

            $user->save();
        }

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

        // if($request->role == "role"){
        //     $user = new User;
        //     $user->is_admin = 1;
        //     $user->save();
        // }


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

        // return redirect('/dashboard/users')->with('success', 'Data berhasil diupdate');
        return back()->with('success', 'Data berhasil diupdate');
    }
    
    public function promote(Request $request, User $user)
    {   
        
        $user->answer->where('user_id',$user->id)->each->delete();
        $user->monitoring->where('user_id',$user->id)->each->delete();
        $user->mysurvey->where('user_id',$user->id)->each->delete();


        $user->is_admin = 1;
        $user->save();

        return back()->with('success', 'User id '.$user->id.' berhasil diangkat menjadi Administrator');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->foto){
            Storage::delete($user->photo);
        }
        User::destroy($user->id);

        return redirect('/dashboard/users')->with('success', 'Surveyor has been deleted');
    }


}
