@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Data BTS</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">list BTS:</li>
    </ol> --}}
    <div class="row">
        <form action="/dashboard/btslists/{{ $btslist->id }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            {{-- <div class="mb-3">
                <span id="id">
                </span>
            </div> --}}
            {{-- <input id="id" type="hidden" name="id" value="{{ $btslists->id }}"> --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama BTS</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $btslist->nama) }}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="btstype_id" class="form-label">Jenis BTS</label>
                    <select class="form-select" name="btstype_id">
                        @foreach ($btstypes as $btstype)
                            @if(old('btstype_id', $btslist->btstype_id) == $btstype->id)
                                <option value="{{ $btstype->id }}" selected>{{ $btstype->type }}</option>
                            @else
                                <option value="{{ $btstype->id }}">{{ $btstype->type }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="owner_id" class="form-label">Owner</label>
                    <select class="form-select" name="owner_id">
                        @foreach ($owners as $owner)
                            @if(old('owner_id', $btslist->owner_id) == $owner->id)
                                <option value="{{ $owner->id }}" selected>{{ $owner->nama }}</option>
                            @else
                                <option value="{{ $owner->id }}">{{ $owner->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="lokasi" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required autofocus value="{{ old('lokasi', $btslist->lokasi) }}">
                    @error('lokasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-2 mb-3">
                    <label for="kecamatan_id" class="form-label">Kecamatan</label>
                    <select class="form-select" name="kecamatan_id">
                        @foreach ($kecamatans as $kecamatan)
                            @if(old('kecamatan_id', $btslist->kecamatan_id) == $kecamatan->id)
                                <option value="{{ $kecamatan->id }}" selected>{{ $kecamatan->nama }}</option>
                            @else
                                <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="village_id" class="form-label">Desa</label>
                    <select class="form-select" name="village_id" >
                        {{-- Post::where('user_id', auth()->user()->id)->get() --}}
                        @foreach ($villages as $village)
                            {{-- @foreach ($villages->where('kecamatan_id', $kecamatans->id)->get() as $village) --}}
                            @if(old('village_id', $btslist->village_id) == $village->id)
                                <option value="{{ $village->id }}" selected>{{ $village->nama }}</option>
                            @else
                                <option value="{{ $village->id }}">{{ $village->nama }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <div class="col-md-2 mb-3">
                    <label for="genset" class="form-label">Genset</label>
                    <select class="form-select @error('genset') is-invalid @enderror" id="genset" name="genset" required autofocus value="{{ old('genset', $btslist->genset) }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="tembokBatas" class="form-label">Tembok Batas</label>
                    <select class="form-select @error('tembokBatas') is-invalid @enderror" id="tembokBatas" name="tembokBatas" required autofocus value="{{ old('tembokBatas', $btslist->tembokBatas) }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="panjangTanah" class="form-label">Panjang Tanah</label>
                    <input type="number" class="form-control @error('panjangTanah') is-invalid @enderror" id="panjangTanah" name="panjangTanah" required autofocus value="{{ old('panjangTanah', $btslist->panjangTanah) }}">
                    @error('panjangTanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lebarTanah" class="form-label">Lebar Tanah</label>
                    <input type="number" class="form-control @error('lebarTanah') is-invalid @enderror" id="lebarTanah" name="lebarTanah" required autofocus value="{{ old('lebarTanah', $btslist->lebarTanah) }}">
                    @error('lebarTanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tinggiTower" class="form-label">Tinggi Tower</label>
                    <input type="number" class="form-control @error('tinggiTower') is-invalid @enderror" id="tinggiTower" name="tinggiTower" required autofocus value="{{ old('tinggiTower', $btslist->tinggiTower) }}">
                    @error('tinggiTower')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" onkeypress="latitude(this.value)" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" required autofocus value="{{ old('latitude', $btslist->latitude) }}">
                    @error('latitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" onkeypress="longitude(this.value)" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" required autofocus value="{{ old('longitude', $btslist->longitude) }}">
                    @error('longitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            {{-- <div class="mb-3">
                <label for="images" class="form-label @error('images') is-invalid @enderror">Foto Bts</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" id="images" name="images[]" onchange="previewImage()" multiple>
                @error('images')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}
{{-- MAIN IMAGE --}}

<div class="mb-3">
    <label for="images" class="form-label @error('images') is-invalid @enderror">BTS Photos</label>
    <img class="img-preview img-fluid mb-3 col-sm-5">
    <input type="hidden" name="oldImages" id="oldImages" value="{{ $btsimgs }}" multiple>
    {{-- @if ($btsphoto->url->where('btslist_id', $btslist->id))
    <img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
        @else
    <img class="img-preview img-fluid mb-3 col-sm-5">
    @endif --}}

    <input class="form-control" type="file" id="images" name="images[]" onchange="previewImage()" multiple>
    @error('images')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
</div>

{{--
            <div class="mb-3">
                <label for="images" class="form-label @error('images') is-invalid @enderror">BTS Images</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" id="images" name="images[]" onchange="previewImage()" multiple>
                @error('images')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}


            {{-- <div class="row">
                <div class="mb-3 images-preview-div">
                    <label for="images" class="form-label @error('images') is-invalid @enderror">Foto-foto BTS</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="images" name="images[]" onchange="previewImage()" multiple>
                    @error('images')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div> --}}

            {{-- <div class="row">
                <div class="mb-3 images-preview-div">
            <form method="POST" action="{{ route('store.uploadimagess') }}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div>
                    <label>Choose Images</label>
                    <input type="file"  name="bts_photos" multiple>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                </div>
                <hr>
                <button type="submit" >Submit</button>
            </form>
                </div>
            </div> --}}

            <button type="submit" class="btn btn-primary mt-4">Update Data BTS</button>
        </form>
    </div>

    {{-- <script>
        function previewImage() {
        const image = document.querySelector('#bts_photos');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        for($i = 0; $i < image.files.length; $i++){
            oFReader.readAsDataURL(image.files[$i]);
        }
        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        // $(function() {
        // // Multiple images preview with JavaScript
        // var previewImages = function(input, imgPreviewPlaceholder) {
        //     if(input.files){
        //         var filesAmount = input.files.length;
        //         for (i = 0; i < filesAmount; i++) {
        //             var reader = new FileReader();
        //             reader.onload = function(event) {
        //                 $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
        //             }
        //             reader.readAsDataURL(input.files[i]);
        //         }
        //     }
        // };

    function previewImage() {
        const btsfoto = document.querySelector('#images');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(btsfoto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    // function previewImage() {
    //     const btsphotos = document.querySelector('#images');
    //     const imgPreview = document.querySelector('.img-preview');

    //     imgPreview.style.display = 'block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(btsphotos.files[0]);

    //     oFReader.onload = function (oFREvent) {
    //         imgPreview.src = oFREvent.target.result;
    //     }
    // }

    // $('#images').on('change', function() {
    //     previewImages(this, 'div.images-preview-div');
    //     });
    // });
</script>
@endsection

@section('page-scripts')
    <script>
        // const title = document.querySelector('#title');
        // const slug = document.querySelector('#slug');

        // title.addEventListener('change', function(){
        //     fetch('/dashboard/posts/checkSlug?title=' + title.value)
        //         .then(response => response.json())
        //         .then(data => slug.value = data.slug)
        // });

        // document.addEventListener('trix-file-accept', function(e){
        //     e.preventDefault();
        // });

        // function previewImage() {
        //     const image = document.querySelector('#bts_photos');
        //     const imgPreview = document.querySelector('.img-preview');

        //     imgPreview.style.display = 'block';

        //     const oFReader = new FileReader();
        //     oFReader.readAsDataURL(image.files[0]);

        //     oFReader.onload = function (oFREvent) {
        //         imgPreview.src = oFREvent.target.result;
        //     }
        // }



        function latitude( str ){
            var latInput = document.getElementById('latitude');
            if(str.length == 3){
                latInput.value = str+',';
            }
        }
        function longitude( str ){
            var longInput = document.getElementById('longitude');
            if(str.length == 2){
                longInput.value = str+',';
            }
        }
    </script>
@endsection
