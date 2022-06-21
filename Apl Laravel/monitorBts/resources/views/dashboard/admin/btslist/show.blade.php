@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $btslist->name }}</h1>

           <a href="/dashboard/btslists" class="btn btn-success"><span data-feather='arrow-left'></span>Back</a>
           @can('admin')
           <a href="/dashboard/btslists/{{ $btslist->id }}/edit" class="btn btn-warning"><span data-feather='edit'></span>Edit Data</a>
           <form action="/dashboard/btslists/{{ $btslist->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
           </form>
           @endcan
           <br>

           @if($btsphotos)
            @foreach ($btsphotos as $btsphoto)
                <div style="max-height: 200px; max-width:400px; overflow:hidden; display:inline-block;">
                    <img src="{{ asset('storage/' . $btsphoto->url) }}" alt="{{ $btslist->btstype->type }}" class="img-fluid mt-3">
                </div>
            @endforeach
           @else
               <img src="https://source.unsplash.com/400x200?{{ $btslist->btstype->type }}" alt="{{ $btslist->btstype->type }}" class="img-fluid mt-3">
           @endif
           <ul>
                {{-- <li>
                    <h5 class="mb-2">Nama : {{ $btslist->nama }}</h5>
                </li> --}}
                <li>
                    <h5 class="mb-2">Tipe BTS : {{ $btslist->btstype->type }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Provider :</h5>
                    @if($btslist->provider)
                        <ul>
                            @foreach($btslist->provider as $providerBtslist)
                                <li>{{ $providerBtslist->nama }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>None</p>
                    @endif
                </li>
                <li>
                    <h5 class="mb-2">Alamat : {{ $btslist->lokasi }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Kelurahan : {{ $btslist->village->nama }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Kecamatan : {{ $btslist->village->kecamatan->nama }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Genset : {{ $btslist->genset }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Tembok Batas : {{ $btslist->tembokBatas }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Panjang Tanah : {{ $btslist->panjangTanah }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Lebar Tanah : {{ $btslist->lebarTanah }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Tinggi Tower : {{ $btslist->tinggiTower }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Latitude : {{ $btslist->latitude }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Longitude : {{ $btslist->longitude }}</h5>
                </li>
            </ul>

        </div>
    </div>
</div>
@endsection
