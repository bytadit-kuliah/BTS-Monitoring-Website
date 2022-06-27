@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Buat Data BTS Baru</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">list BTS:</li>
    </ol> --}}
    <div class="row">
        <form action="/dashboard/btslists/" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <span id="id">
                </span>
            </div> --}}
            {{-- <input id="id" type="hidden" name="id" value="{{ $btslists->id }}"> --}}
            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="nama" class="form-label">Nama BTS</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama') }}">
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
                            @if(old('btstype_id') == $btstype->id)
                                <option value="{{ $btstype->id }}" selected>{{ $btstype->type }}</option>
                            @else
                                <option value="{{ $btstype->id }}">{{ $btstype->type }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="provider_id" class="form-label">Provider</label>
                    <select class="js-example-basic-multiple" name="provider_id[]" multiple="multiple" style="width: 100%">
                        @foreach ($providers as $provider)
                            @if(old('provider_id') == $provider->id)
                                <option value="{{ $provider->id }}" selected>{{ $provider->nama }}</option>
                            @else
                                <option value="{{ $provider->id }}">{{ $provider->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="lokasi" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required autofocus value="{{ old('lokasi') }}">
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
                            @if(old('kecamatan_id') == $kecamatan->id)
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
                        {{-- @foreach ($villages->where('kecamatan_id', $selectedKecamatan) as $village) --}}
                            @if(old('village_id') == $village->id)
                                <option value="{{ $village->id }}" selected>{{ $village->nama }}</option>
                            @else
                                <option value="{{ $village->id }}">{{ $village->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    {{-- <h5>{{ print_r(old('kecamatan_id')) }}</h5> --}}

                </div>
                <div class="col-md-2 mb-3">
                    <label for="genset" class="form-label">Genset</label>
                    <select class="form-select @error('genset') is-invalid @enderror" id="genset" name="genset" required autofocus value="{{ old('genset') }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="tembokBatas" class="form-label">Tembok Batas</label>
                    <select class="form-select @error('tembokBatas') is-invalid @enderror" id="tembokBatas" name="tembokBatas" required autofocus value="{{ old('tembokBatas') }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="panjangTanah" class="form-label">Panjang Tanah</label>
                    <input type="number" class="form-control @error('panjangTanah') is-invalid @enderror" id="panjangTanah" name="panjangTanah" required autofocus value="{{ old('panjangTanah') }}">
                    @error('panjangTanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lebarTanah" class="form-label">Lebar Tanah</label>
                    <input type="number" class="form-control @error('lebarTanah') is-invalid @enderror" id="lebarTanah" name="lebarTanah" required autofocus value="{{ old('lebarTanah') }}">
                    @error('lebarTanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tinggiTower" class="form-label">Tinggi Tower</label>
                    <input type="number" class="form-control @error('tinggiTower') is-invalid @enderror" id="tinggiTower" name="tinggiTower" required autofocus value="{{ old('tinggiTower') }}">
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
                    <input type="text" onkeypress="latitude(this.value)" class="form-control @error('latitude') is-invalid @enderror" id="latitude" name="latitude" required autofocus value="{{ old('latitude') }}">
                    @error('latitude')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" onkeypress="longitude(this.value)" class="form-control @error('longitude') is-invalid @enderror" id="longitude" name="longitude" required autofocus value="{{ old('longitude') }}">
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
                <input class="form-control" type="file" id="images" name="images[]" onchange="previewImage()" multiple>
                @error('images')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>


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

            <button type="submit" class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Tambah BTS</button>
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
        var kecamatan_id = document.getElementById('kecamatan_id').value
    </script>
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
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
