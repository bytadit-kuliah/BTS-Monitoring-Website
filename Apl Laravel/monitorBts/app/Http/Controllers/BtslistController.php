<?php

namespace App\Http\Controllers;

use App\Models\Btslist;

use App\Models\Provider;
use App\Models\Village;
use App\Models\Kecamatan;
use App\Models\Btstype;
use App\Models\Mysurvey;
use App\Models\Survey;
use App\Models\Config;
use App\Models\Btsphoto;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class BtslistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Btslist $btslist, Btsphoto $btsphoto)
    {

        $btslists=Btslist::when($request->has("nama"),function($q)use($request){
            return $q->where("nama","like","%".$request->get("nama")."%");
        })->paginate(9);
        $total_data=$btslists->count();
        if($request->ajax()){
            return view('dashboard.admin.btslist.btsdata ',[
                'configs' => Config::all()->first(),
                'btslists' => $btslists,
                'total_card' => $total_data,
                'btsphotos' => Btsphoto::where('btslist_id', $btslist->id)->get(),
                'btsphoto' => $btsphoto
            ]);
        }
        return view('dashboard.admin.btslist.index', [
            'btslists' => $btslists,
            'total_card' => $total_data,
            'configs' => Config::all()->first(),
            'btsphotos' => Btsphoto::where('btslist_id', $btslist->id)->get(),
            'btsphoto' => $btsphoto
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Kecamatan $kecamatan)
    {
        return view('dashboard.admin.btslist.create', [

            'btslists' => Btslist::all(),
            'request' => $request,
            'btstypes' => Btstype::all(),
            'kecamatans' => Kecamatan::all(),
            'configs' => Config::all()->first(),
            'kecamatan' => $kecamatan,
            'villages' => Village::all(),
            'providers' => Provider::all(),
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
            'provider_id' => 'required',
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
            'images' => 'required|max:2048'
        ]);

        $btslist = new Btslist;
        $btslist->nama = $request->nama;
        $btslist->btstype_id = $request->btstype_id;
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

        $provider = Provider::find($request->provider_id);
        $btslist->providers()->attach($provider);

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
    public function show(Btslist $btslist)
    {
        return view('dashboard.admin.btslist.show', [
            'btslist' => $btslist,
            'configs' => Config::all()->first(),
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
            'configs' => Config::all()->first(),
            'kecamatans' => Kecamatan::all(),
            'villages' => Village::all(),
            'providers' => Provider::all(),
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
        
        $btslist = Btslist::findOrFail($id);

        $this->validate($request, [
            'nama' => 'required|max:255',
            'btstype_id' => 'required',
            'provider_id' => 'required',
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

        $input = $request->except(['kecamatan_id', 'images', 'provider_id']);
        $btslist->fill($input)->save();
        $provider = Provider::find($request->provider_id);
        $btslist->providers()->sync($provider);

        if($request->file('images')){
            Btsphoto::where('btslist_id', $id)->delete();
        }
        // Klo update harus milih gambar lagi
        foreach ($request->file('images') as $imagefile) {
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
    public function destroy(Btslist $btslist, Request $request)
    {

        Monitoring::where('btslist_id', $btslist->id)->delete();
        Mysurvey::where('btslist_id', $btslist->id)->delete();
        Btslist::destroy($btslist->id);
        $provider = Provider::find($request->provider_id);
        $btslist->providers()->detach($provider);

        $survey = Survey::find($request->survey_id);
        $btslist->surveys()->detach($survey);

        return redirect('/dashboard/btslists')->with('success', 'Data BTS telah dihapus');
    }

}
