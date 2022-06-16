<?php

namespace App\Http\Controllers;

use App\Models\bts_photo;
use App\Models\jenis_bts;
use App\Models\bts;
use App\Models\owner;
use App\Models\village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BTSPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.BTS.index', [
            'bts_list' => bts::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.BTS.create', [
            'bts_type' => jenis_bts::all(),
            'villages' => village::all(),
            'owners' => owner::all()
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
            'bts_photos' => 'required',
            'bts_photos.*' => 'mimes:jpg,png,jpeg,gif,svg',
            'bts_id' => 'required'
            ]);
            if($request->hasfile('bts_photos'))
             {
                foreach($request->file('bts_photos') as $key => $file)
                {
                    $path = $file->store('public/bts_photos');
                    $name = $file->getClientOriginalName();
                    $insert[$key]['name'] = $name;
                    $insert[$key]['pathFoto'] = $path;
                }
             }
            bts_photo::insert($insert);
            return redirect('/dashboard/edit-bts')->with('success', 'New BTS has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bts_photo  $bts_photo
     * @return \Illuminate\Http\Response
     */
    // public function show(bts_photo $bts_photo)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bts_photo  $bts_photo
     * @return \Illuminate\Http\Response
     */
    // public function edit(bts_photo $bts_photo)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bts_photo  $bts_photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bts_photo $bts_photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bts_photo  $bts_photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(bts_photo $bts_photo)
    {
        //
    }
}
