@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-12 justify-content-center text-center">
            <h1 class="mb-3">{{ $btslist->name }}</h1>

           <a href="/dashboard/btslists" class="btn btn-success add-new" style="background: #52784F; color: #fff"><span data-feather='arrow-left'></span>Back</a>
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
                @if($btsphotos->count()==1)
                <div id="btsPhotosCarousel" class="carousel slide text-dark d-flex" data-bs-ride="true">
                    <div class="carousel-inner text-center mb-2 justify-content-center">
                            <div class="carousel-item active text-center">
                                <div alt="{{ $btslist->btstype->type }}" class="w-100 rounded-5 img-fluid mt-3 text-center"
                                    style="width:500px;height:600px;background-size: contain;background-repeat:no-repeat;
                                    background-position: center;background-image:url('{{ asset('storage/' . $btsphotos[0]->url) }}')"></div>
                                {{-- <img src="{{ asset('storage/' . $btsphoto->url) }}" alt="{{ $btslist->btstype->type }}" class="w-75 rounded-5 img-fluid mb-5 mt-3"> --}}
                            </div>
                    </div>
                </div>


                @else
                    <div id="btsPhotosCarousel" class="carousel slide text-dark d-flex" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide-to="0" class="active border border-dark rounded-3" aria-current="true" aria-label="Slide 1"></button>
                            @foreach ($btsphotos as $btsphoto)
                                @if($loop->iteration > 1)
                                    <button type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide-to="{{$loop->iteration-1}}" class="border border-dark rounded-3" aria-label="Slide {{($loop->iteration)}}"></button>
                                @endif
                            @endforeach
                        </div>
                        <div class="carousel-inner text-center mb-2 justify-content-center">
                            @foreach ($btsphotos as $btsphoto)
                                @if($loop->iteration == 1)
                                    <div class="carousel-item active text-center">
                                        <div alt="{{ $btslist->btstype->type }}" class="w-100 rounded-5 img-fluid mt-3 text-center"
                                            style="width:500px;height:600px;background-size: contain;background-repeat:no-repeat;
                                            background-position: center;background-image:url('{{ asset('storage/' . $btsphoto->url) }}')"></div>
                                        {{-- <img src="{{ asset('storage/' . $btsphoto->url) }}" alt="{{ $btslist->btstype->type }}" class="w-75 rounded-5 img-fluid mb-5 mt-3"> --}}
                                    </div>
                                @else
                                    <div class="carousel-item text-center">
                                        <div alt="{{ $btslist->btstype->type }}" class="w-100 rounded-5 img-fluid mt-3 text-center"
                                            style="width:500px;height:600px;background-size: contain;background-repeat:no-repeat;
                                            background-position: center;background-image:url('{{ asset('storage/' . $btsphoto->url) }}')"></div>
                                        {{-- <img src="{{ asset('storage/' . $btsphoto->url) }}" alt="{{ $btslist->btstype->type }}" class="w-75 rounded-5 img-fluid mb-5 mt-3"> --}}
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" style="filter: invert(100%);" aria-hidden=""></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#btsPhotosCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" style="filter: invert(100%);" aria-hidden=""></span>
                            <span class="visually-hidden ">Next</span>
                        </button>
                    </div>
                @endif
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
                            @if($btslist->providers)
                                @foreach($btslist->providers as $providerBtslist)
                                    @if ($loop->iteration==1)
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
                        <td>
                            @if($btslist->genset == 1)
                                {{"Ada"}}
                            @else
                                {{"Tidak Ada"}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Tembok Batas</td>
                        <td>
                            @if($btslist->tembokBatas == 1)
                                {{"Ada"}}
                            @else
                                {{"Tidak Ada"}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Panjang Tanah</td>
                        <td> {{ $btslist->panjangTanah.' meter' }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Lebar Tanah</td>
                        <td> {{ $btslist->lebarTanah.' meter' }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Tinggi Tower</td>
                        <td> {{ $btslist->tinggiTower.' meter' }} </td>
                    </tr>
                    <tr>
                        <td class='table-light'>Latitude</td>
                        {{-- <td> {{ $btslist->latitude.'°'.'S' }} </td> --}}
                        <td id="latitudeVal"> {{ $btslist->latitude }} </td>

                    </tr>
                    <tr >
                        <td class='table-light' >Longitude</td>
                        <td id="longitudeVal"> {{ $btslist->longitude}} </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="map" style="max-width:1000px; max-height:1000px"></div>

    </div>
</div>

<script>
    $(document).ready(function (){
     var myLatlng = new google.maps.LatLng(-25.363882,131.044922);
     var myOptions = {
         zoom: 4,
         center: myLatlng,
         mapTypeId: google.maps.MapTypeId.ROADMAP
         }
      map = new google.maps.Map($('#map'), myOptions);
      var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
      title:"Fast marker"
     });
}
</script>
@endsection
