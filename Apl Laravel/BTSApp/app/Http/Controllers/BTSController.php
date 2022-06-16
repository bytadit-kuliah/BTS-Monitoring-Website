<?php

namespace App\Http\Controllers;

use App\Models\bts;
use App\Models\owner;
use App\Models\village;
use App\Models\bts_photo;
use App\Models\jenis_bts;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $validatedData = $request->validate([
            'namaBTS' => 'required|max:255',
            'jenisBTS_id' => 'required',
            'owner_id' => 'required',
            'lokasi' => 'required',
            'desa_id' => 'required',
            'genset' => 'required',
            'tembok_batas' => 'required',
            'panjang_tanah' => 'required',
            'lebar_tanah' => 'required',
            'tinggi_tower' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'bts_photos' => 'image|file|max:3000'
        ]);

        $validatedData['publishedBy'] = auth()->user()->id;

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }

        bts::create($validatedData);
        // $this->validate($request, [
        //     'namaBTS' => 'required|max:255',
        //     'jenisBTS_id' => 'required',
        //     'owner_id' => 'required',
        //     'lokasi' => 'required',
        //     'desa_id' => 'required',
        //     'genset' => 'required',
        //     'tembok_batas' => 'required',
        //     'panjang_tanah' => 'required',
        //     'lebar_tanah' => 'required',
        //     'tinggi_tower' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required',
        //    ]);

        //    $BTSN = new bts;
        //    $BTSN->namaBTS = $request->namaBTS;
        //    $BTSN->jenisBTS_id = $request->jenisBTS_id;
        //    $BTSN->owner_id = $request->owner_id;
        //    $BTSN->lokasi = $request->lokasi;
        //    $BTSN->desa_id = $request->desa_id;
        //    $BTSN->genset = $request->genset;
        //    $BTSN->tembok_batas = $request->tembok_batas;
        //    $BTSN->panjang_tanah = $request->panjang_tanah;
        //    $BTSN->lebar_tanah = $request->lebar_tanah;
        //    $BTSN->tinggi_tower = $request->tinggi_tower;
        //    $BTSN->latitude = $request->latitude;
        //    $BTSN->longitude = $request->longitude;
        //    $BTSN->publishedBy = auth()->user()->id;
        //    $BTSN->save();

        // $id = bts::create($validatedData);

        // foreach ($request->file('bts_photos') as $imagefile) {
        //     $btsPhoto = new bts_photo;
        //     $path = $imagefile->store('/images/resource', ['disk' =>   'bts_photos']);
        //     $btsPhoto->pathFoto = $path;
        //     $btsPhoto->bts_id = $BTSN->id;
        //     $btsPhoto->save();
        // }

        // bts_photo::create([

        //     'bts_id' => $id->id,
        //     'name' => $request->file('bts-photos')->getClientOriginalName(),
        //     "pathFoto" => $request->file('bts-photos')->store('bts-images')
        // ]);

        // if($request->file('bts-photos')){
        //         $validatedData['pathFoto'] = $request->file('bts-photos')->store('bts-images');
        //         $validatedData['name'] = $request->file('bts-photos')->getClientOriginalName();
        //     }

        // bts_photo::create($validatedData);

        // if($request->hasfile('bts_photos'))
        //  {
        //     foreach($request->file('bts_photos') as $key => $file)
        //     {
        //         $path = $file->store('public/images');
        //         $name = $file->getClientOriginalName();
        //         $insert[$key]['name'] = $name;
        //         $insert[$key]['pathFoto'] = $path;
        //     }

        //  }
        //  bts_photo::insert($insert);



        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        return redirect('/dashboard/edit-bts')->with('success', 'New BTS has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bts  $bts
     * @return \Illuminate\Http\Response
     */
    public function show(bts $bts)
    {
        // return view('dashboard.admin.BTS.show', [
        //     'bts' => $bts
        // ]);

        return $bts;
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
            'bts' => $bts,
            'bts_type' => jenis_bts::all(),
            'villages' => village::all(),
            'owners' => owner::all()
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
        $rules = [
            'namaBTS' => 'required|max:255',
            'jenisBTS_id' => 'required',
            'owner_id' => 'required',
            'lokasi' => 'required',
            'desa_id' => 'required',
            'genset' => 'required',
            'tembok_batas' => 'required',
            'panjang_tanah' => 'required',
            'lebar_tanah' => 'required',
            'tinggi_tower' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ];

        $validatedData = $request->validate($rules);

        // if($request->file('image')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // }

        $validatedData['publishedBy'] = auth()->user()->id;

        bts::where('id', $bts->id)->update($validatedData);

        return redirect('/dashboard/edit-bts')->with('success', 'Data BTS Terupdate');
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

        return redirect('/dashboard/edit-bts')->with('success', 'Data BTS telah dihapus');
    }
}
