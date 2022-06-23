@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-12 justify-content-center text-center">
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
                <div id="btsPhotosCarousel" class="carousel slide text-dark" data-bs-ride="true">
                    <div class="carousel-indicators">
                        @foreach ($btsphotos as $btsphoto)
                            @if ($loop->iteration == 0)
                                <button type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            @else
                                <button type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide-to="{{$loop->iteration}}" aria-label="Slide {{($loop->iteration)+1}}"></button>                            
                            @endif
                        @endforeach
                    </div>
                    <div class="carousel-inner">
                        @foreach ($btsphotos as $btsphoto)
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/' . $btsphoto->url) }}" alt="{{ $btslist->btstype->type }}" class="w-75 rounded-5 img-fluid mb-5 mt-5">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden=""></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden=""></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
           @else
               <img src="https://source.unsplash.com/400x200?{{ $btslist->btstype->type }}" alt="{{ $btslist->btstype->type }}" class="w-75 rounded-5 img-fluid mb-5 mt-3">
           @endif

            <table class="table ">
                <thead class="table-success ">
                    <th style='border-top-left-radius:1rem'>
                        Keterangan
                    </th>
                    <th style='border-top-right-radius:1rem'>
                        Nilai
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td class='table-light w-25'>Nama</td>
                        <td> {{ $btslist->nama }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Tipe BTS</td>
                        <td> {{ $btslist->btstype->type }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Provider</td>
                        <td> 
                            @if($btslist->provider)
                                @foreach($btslist->provider as $providerBtslist)
                                    @if ($loop->iteration==0)
                                        {{ $providerBtslist->nama }}
                                    @else
                                        {{ ','.$providerBtslist->nama }}
                                    @endif                                
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Alamat</td>
                        <td> {{ $btslist->lokasi }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Kelurahan</td>
                        <td> {{ $btslist->village->nama }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Kecamatan</td>
                        <td> {{ $btslist->village->kecamatan->nama }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Genset</td>
                        <td> {{ $btslist->genset }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Tembok Batas</td>
                        <td>  {{ $btslist->tembokBatas }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Panjang Tanah</td>
                        <td> {{ $btslist->panjangTanah }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Lebar Tanah</td>
                        <td> {{ $btslist->lebarTanah }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Tinggi Tower</td>
                        <td> {{ $btslist->tinggiTower }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Latitude</td>
                        <td> {{ $btslist->latitude }} </td>
                    </tr>
                    <tr >
                        <td class='table-light' >Longitude</td>
                        <td> {{ $btslist->longitude }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
