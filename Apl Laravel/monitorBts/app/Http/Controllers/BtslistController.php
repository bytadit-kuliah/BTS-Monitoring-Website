<?php

namespace App\Http\Controllers;

use App\Models\Btslist;
use App\Models\Owner;
use App\Models\Village;
use App\Models\Kecamatan;
use App\Models\Btstype;
use App\Models\Btsphoto;
use Illuminate\Http\Request;

class BtslistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.btslist.index', [
            'btslists' => Btslist::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $kecamatan = new Kecamatan();
        // $kecamatan_id =  $kecamatan->id;
        // $kecamatan_id  = $request->input('kecamatan_id');
        return view('dashboard.admin.btslist.create', [

            'btslists' => Btslist::all(),
            'btstypes' => Btstype::all(),
            'villages' => Village::all(),
            // 'villages' => Village::where('kecamatan_id', $kecamatan_id)->get(),
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
            'owners' => Owner::all(),
            'kecamatans' => Kecamatan::all()
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
            'btstype_id' => 'required',
            'owner_id' => 'required',
            'lokasi' => 'required',
            'village_id' => 'required',
            'kecamatan_id' => 'required',
            'genset' => 'required',
            'tembokBatas' => 'required',
            'panjangTanah' => 'required',
            'lebarTanah' => 'required',
            'tinggiTower' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'btsphoto' => 'image|file|max:2048'
            // 'bts_photos' => 'image|file|max:3000'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        // $btslists = new Btslist;
        // foreach ($request->file('btsphoto') as $imagefile) {
        //     $image = new Btsphoto;
        //     $path = $imagefile->store('bts-photo');
        //     $image->url = $path;
        //     $image->btslist_id = $btslists->id;
        //     $image->save();
        // }
        // foreach($request->file('foto') as ){
        //     $validatedData['foto'] = $request->file('foto')->store('owner-foto');
        // }
        Btslist::create($validatedData);
        // $btslists = Btslist::all();
        if($request->hasfile('images'))
        {
           foreach($request->file('images') as $key => $file)
           {
            //    $btslists = new Btslist;
               $path = $file->store('images');
               $insert[$key]['url'] = $path;
               $insert[$key]['btslist_id'] = $request->id;
           }
        }
        Btsphoto::insert($insert);

        // return redirect('/dashboard/btslists')->with('success', 'Data BTS Baru Berhasil Ditambahkan');
        return $validatedData;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function show(Btslist $btslist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function edit(Btslist $btslist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Btslist $btslist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Btslist $btslist)
    {
        // if($owner->foto){
        //     Storage::delete($owner->foto);
        // }
        Btslist::destroy($btslist->id);

        return redirect('/dashboard/btslists')->with('success', 'Owner has been deleted');
    }
}
