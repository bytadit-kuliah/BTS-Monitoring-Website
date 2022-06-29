<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Config;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.provider.index', [
            'providers' => Provider::all(),
            'configs' => Config::all()->first(),
        ]);
        // return Provider::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.provider.create', [
            'providers' => Provider::all(),
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProviderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, )
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'noTelp' => 'required',
            'foto' => 'max:2048'
        ]);

        if($request->file('foto')){
            $validatedData['foto'] = $request->file('foto')->store('providers-foto');
        }

        Provider::create($validatedData);

        return redirect('/dashboard/providers')->with('success', 'Provider Baru telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return $provider;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('dashboard.admin.provider.edit', [
            'provider' => $provider,
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $rules = [
            'nama' => 'required|max:255',
            'alamat' => 'required',
            'noTelp' => 'required',
            'foto' => 'max:2048'
        ];

        $validatedData = $request->validate($rules);

        if($request->file('foto')){
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('providers-foto');
        }

        Provider::where('id', $provider->id)->update($validatedData);

        return redirect('/dashboard/providers')->with('success', 'Data Provider berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        if($provider->foto){
            Storage::delete($provider->foto);
        }
        Provider::destroy($provider->id);

        return redirect('/dashboard/providers')->with('success', 'Provider berhasil dihapus');
    }
}
