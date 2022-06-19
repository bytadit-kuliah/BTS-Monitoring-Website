<?php

namespace App\Http\Controllers;

use App\Models\Btslist;
use App\Models\Owner;
use App\Models\Village;
use App\Models\Kecamatan;
use App\Models\Btstype;
use App\Models\Btsphoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
    public function create(Request $request, Kecamatan $kecamatan)
    {
        // $kecamatan = new Kecamatan();
        // $kecamatan_id =  $kecamatan->id;
        // $kecamatan_id  = $request->input('kecamatan_id');
        return view('dashboard.admin.btslist.create', [

            'btslists' => Btslist::all(),
            'request' => $request,
            'btstypes' => Btstype::all(),
            'kecamatans' => Kecamatan::all(),
            'kecamatan' => $kecamatan,
            'villages' => Village::all(),
            // 'villages' => Village::where('kecamatan_id', '1')->get(),
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
            'owners' => Owner::all(),
            // 'selected' => print_r($request->kecamatan_id)
            // 'selectedKecamatan' => Kecamatan::first()->kecamatan_id,
            'value' => $request->kecamatan_id
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
        $this->validate($request, [
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
            'images' => 'max:2048'
        ]);

        $btslist = new Btslist;
        $btslist->nama = $request->nama;
        $btslist->btstype_id = $request->btstype_id;
        $btslist->owner_id = $request->owner_id;
        $btslist->lokasi = $request->lokasi;
        $btslist->village_id = $request->village_id;
        $btslist->genset = $request->genset;
        $btslist->tembokBatas = $request->tembokBatas;
        $btslist->panjangTanah = $request->panjangTanah;
        $btslist->lebarTanah = $request->lebarTanah;
        $btslist->tinggiTower = $request->tinggiTower;
        $btslist->latitude = $request->latitude;
        $btslist->longitude = $request->longitude;
        $btslist->user_id = auth()->user()->id;;
        $btslist->save();

        foreach ($request->file('images') as $imagefile) {
            $image = new Btsphoto;
            $path = $imagefile->store('btsphotos');
            $image->url = $path;
            $image->btslist_id = $btslist->id;
            $image->save();
        }

        return redirect('/dashboard/btslists')->with('success', 'Data BTS Baru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function show(Btslist $btslist, Btsphoto $btsphoto)
    {
        return view('dashboard.admin.btslist.show', [
            'btslist' => $btslist,
            'btsphotos' => Btsphoto::where('btslist_id', $btslist->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function edit(Btslist $btslist, Btsphoto $btsphoto)
    {
        return view('dashboard.admin.btslist.edit', [
            'btslist' => $btslist,
            'btsphoto' => $btsphoto,
            'btslists' => Btslist::all(),
            'btstypes' => Btstype::all(),
            'kecamatans' => Kecamatan::all(),
            'villages' => Village::all(),
            // 'villages' => Village::where('kecamatan_id', '1')->get(),
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
            'owners' => Owner::all(),
            'btsimgs' => Btsphoto::where('btslist_id', $btslist->id)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Btslist  $btslist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'nama' => 'required|max:255',
        //     'btstype_id' => 'required',
        //     'owner_id' => 'required',
        //     'lokasi' => 'required',
        //     'village_id' => 'required',
        //     'kecamatan_id' => 'required',
        //     'genset' => 'required',
        //     'tembokBatas' => 'required',
        //     'panjangTanah' => 'required',
        //     'lebarTanah' => 'required',
        //     'tinggiTower' => 'required',
        //     'latitude' => 'required',
        //     'longitude' => 'required',
        //     'images' => 'max:2048'
        // ]);

        // $btslist = new Btslist;
        // $btslist->nama = $request->nama;
        // $btslist->btstype_id = $request->btstype_id;
        // $btslist->owner_id = $request->owner_id;
        // $btslist->lokasi = $request->lokasi;
        // $btslist->village_id = $request->village_id;
        // $btslist->genset = $request->genset;
        // $btslist->tembokBatas = $request->tembokBatas;
        // $btslist->panjangTanah = $request->panjangTanah;
        // $btslist->lebarTanah = $request->lebarTanah;
        // $btslist->tinggiTower = $request->tinggiTower;
        // $btslist->latitude = $request->latitude;
        // $btslist->longitude = $request->longitude;
        // $btslist->user_id = auth()->user()->id;
        // $btslist->where('id', $btslist->id)->update();

        // foreach ($request->file('images') as $imagefile) {
        //     $image = new Btsphoto;
        //     $path = $imagefile->store('btsphotos');
        //     $image->url = $path;
        //     $image->btslist_id = $btslist->id;
        //     $image->where('id', $image->id)->update();
        // }

        // $rules = array(
        //     'name'       => 'required',
        //     'email'      => 'required|email',
        //     'shark_level' => 'required|numeric'
        // );
        // ==================================
        $btslist = Btslist::findOrFail($id);

        $this->validate($request, [
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
            'images' => 'max:2048|required'
        ]);

        $input = $request->except(['kecamatan_id', 'images']);
        $btslist->fill($input)->save();
// ================================================================
        // $btsphoto = Btsphoto::where('btstype_id', $id);

        // $inputgbr = $request->only('images');
        // $btsphoto->url->fill($inputgbr)->save();

        if($request->file('images')){
            Btsphoto::where('btslist_id', $id)->delete();
        }
        // Klo update harus milih gambar lagi
        foreach ($request->file('images') as $imagefile) {
            // if($request->oldImages){
            //     Storage::delete($request->oldImages);
            // }
            // Btsphoto::where('btslist_id', $id)->delete();
            // $btsphoto->url = $request->get('images');
            $image = new Btsphoto;
            $path = $imagefile->store('btsphotos');
            $image->url = $path;
            $image->btslist_id = $id;
            $image->save();
        }


        return redirect('/dashboard/btslists')->with('success', 'Data BTS Berhasil Diupdate');
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
