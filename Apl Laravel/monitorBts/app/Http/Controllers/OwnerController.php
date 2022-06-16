<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Auth;
// use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.owner.index', [
            'owners' => Owner::all()
        ]);
        // return Owner::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.owner.create', [
            'owners' => Owner::all()
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
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'noTelp' => 'required',
            'foto' => 'image|file|max:2048'
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('owner-foto');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Owner::create($validatedData);

        return redirect('/dashboard/owners')->with('success', 'Owner Baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return $owner;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('dashboard.admin.owner.edit', [
            'owner' => $owner
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $rules = [
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'noTelp' => 'required',
            'foto' => 'image|file|max:2048'
        ];

// // mengatasi masalah slug tidak bisa sama spt sebelumnya
//         if($request->slug != $post->slug){
//             $rules['slug'] = 'required|unique:posts';
//         }

        $validatedData = $request->validate($rules);

        if($request->file('foto')){
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('owner-foto');
        }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Owner::where('id', $owner->id)->update($validatedData);

        return redirect('/dashboard/owners')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        if($owner->foto){
            Storage::delete($owner->foto);
        }
        Owner::destroy($owner->id);

        return redirect('/dashboard/owners')->with('success', 'Owner has been deleted');
    }
}
