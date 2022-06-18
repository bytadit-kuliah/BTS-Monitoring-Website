<?php

namespace App\Http\Controllers;

use App\Models\Btsphoto;
use App\Models\Btslist;
use App\Http\Requests\StoreBtsphotoRequest;
use App\Http\Requests\UpdateBtsphotoRequest;

class BtsphotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBtsphotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBtsphotoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Btsphoto  $btsphoto
     * @return \Illuminate\Http\Response
     */
    public function show(Btsphoto $btsphoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Btsphoto  $btsphoto
     * @return \Illuminate\Http\Response
     */
    public function edit(Btsphoto $btsphoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBtsphotoRequest  $request
     * @param  \App\Models\Btsphoto  $btsphoto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBtsphotoRequest $request, Btsphoto $btsphoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Btsphoto  $btsphoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Btsphoto $btsphoto)
    {
        //
    }
}
