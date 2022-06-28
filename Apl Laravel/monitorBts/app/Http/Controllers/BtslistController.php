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
                // 'btslists' => Btslist::all(),
                'configs' => Config::all()->first(),
                'btslists' => $btslists,
                'total_card' => $total_data,
                'btsphotos' => Btsphoto::where('btslist_id', $btslist->id)->get(),
                'btsphoto' => $btsphoto
            ]);
        }
        return view('dashboard.admin.btslist.index', [
            // 'btslists' => Btslist::all(),
            'btslists' => $btslists,
            'total_card' => $total_data,
            'configs' => Config::all()->first(),
            // 'btslist' => $btslist,
            'btsphotos' => Btsphoto::where('btslist_id', $btslist->id)->get(),
            // 'firstPhoto' => $btsphoto->where('btslist_id', $btslist->id)->get(),
            'btsphoto' => $btsphoto
        ]);
    }

// public function search(Request $request, Btslist $btslist){

//     if($request->ajax()){

//     $output="";
//     $results=$btslist->where('nama','LIKE','%'.$request->search.'%')->get();

//     if($results){

//         foreach ($results as $key => $result) {
//             $output.='<tr>'.
//                     '<td>'.$result->id.'</td>'.
//                     '<td>'.$result->title.'</td>'.
//                     '<td>'.$result->description.'</td>'.
//                     '<td>'.$result->price.'</td>'.
//                     '</tr>';
//         }
//         return Response($output);

//    }
//    }

// }

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
            'configs' => Config::all()->first(),
            'kecamatan' => $kecamatan,
            'villages' => Village::all(),
            // 'villages' => Village::where('kecamatan_id', '1')->get(),
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
            'providers' => Provider::all(),
            // 'selected' => print_r($request->kecamatan_id)
            // 'selectedKecamatan' => Kecamatan::first()->kecamatan_id,
            'value' => $request->kecamatan_id
        ]);

        // if ($request->ajax()) {
        //     return response($id)->json([
        //         'villages' => Village::where('kecamatan_id', $id)->get()
        //     ]);
        // }

    }
    // public function getVillage(Kecamatan $kecamatan)
    // {
    //     return $kecamatan->villages()->select('id', 'nama')->get();
    // }

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
        // $btslist->provider_id = $request->provider_id;
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
        // return $provider;
        // $input = $request->all();
        // $provider_id = $input['provider_id'];
        // $input['provider_id'] = implode(',', $provider_id);

        // User::create($input);
        // return redirect()->back();

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
            // 'villages' => Village::where('kecamatan_id', '1')->get(),
            // 'posts' => Post::where('user_id', auth()->user()->id)->get()
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
        // $this->validate($request, [
        //     'nama' => 'required|max:255',
        //     'btstype_id' => 'required',
        //     'provider_id' => 'required',
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
        // $btslist->provider_id = $request->provider_id;
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
    public function destroy(Btslist $btslist, Request $request)
    {
        // if($provider->foto){
        //     Storage::delete($provider->foto);
        // }
        Monitoring::where('btslist_id', $btslist->id)->delete();
        Mysurvey::where('btslist_id', $btslist->id)->delete();
        Btslist::destroy($btslist->id);
        // DB::table('btslist_provider')->where('btslist_id', '=', $btslist->id)->delete();
        $provider = Provider::find($request->provider_id);
        $btslist->providers()->detach($provider);

        $survey = Survey::find($request->survey_id);
        $btslist->surveys()->detach($survey);



        // $provider = Provider::find($request->provider_id);
        // $btslist->providers()->attach($provider);

        // $provider = Provider::find($request->provider_id);
        // $btslist->providers()->sync($provider);

        return redirect('/dashboard/btslists')->with('success', 'Data BTS telah dihapus');
    }


    // function action(Request $request, Btslist $btslist, Btsphoto $btsphoto)
    // {
    //     if($request->ajax()){
    //         $output = '';
    //         $query = $request->get('query');
    //         if($query != ''){
    //         $btsdata = DB::table('btslists')
    //             ->where('nama', 'like', '%'.$query.'%')
    //             // ->orWhere('Address', 'like', '%'.$query.'%')
    //             // ->orWhere('City', 'like', '%'.$query.'%')
    //             // ->orWhere('PostalCode', 'like', '%'.$query.'%')
    //             // ->orWhere('Country', 'like', '%'.$query.'%')
    //             ->orderBy('id', 'desc')
    //             ->get();
    //         $photodata = DB::table('btsphotos')
    //             ->firstWhere('btslist_id', )
    //             // ->orWhere('Address', 'like', '%'.$query.'%')
    //             // ->orWhere('City', 'like', '%'.$query.'%')
    //             // ->orWhere('PostalCode', 'like', '%'.$query.'%')
    //             // ->orWhere('Country', 'like', '%'.$query.'%')
    //             ->orderBy('id', 'desc')
    //             ->get();
    //         }
    //     else
    //         $btsdata = DB::table('btslists')
    //         ->orderBy('id', 'desc')
    //         ->get();
    //     }
    //     $total_card = $btsdata->count();
    //     if($total_card > 0){
    //       foreach($btsdata as $card){
    //           $output .= '
    //           <tr>
    //           <td>'.$card->CustomerName.'</td>
    //           <td>'.$card->Address.'</td>
    //           <td>'.$card->City.'</td>
    //           <td>'.$card->PostalCode.'</td>
    //           <td>'.$card->Country.'</td>
    //           </tr>
    //           ';
    //         }
    //     }
    //   else{
    //    $output = '
    //    <tr>
    //     <td align="center" colspan="5">No Data Found</td>
    //    </tr>
    //    ';
    //   }
    //   $btsdata = array(
    //    'table_data'  => $output,
    //    'total_data'  => $total_row
    //   );

    //   echo json_encode($btsdata);
    //  }
    // }
}
