<?php

namespace App\Http\Controllers;

use App\Models\bts;
use Illuminate\Http\Request;
use App\Models\bts_photo;
use App\Models\jenis_bts;
use App\Models\village;
use App\Models\owner;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BTSController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function show(bts $bts)
    {
        return view('dashboard.admin.BTS.show', [
            'bts' => $bts
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function edit(bts $bts)
    {
        return view('dashboard.admin.BTS.edit', [
            'bts' => $bts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bts $bts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function destroy(bts $bts)
    {
        bts::destroy($bts->id);
    }
}
