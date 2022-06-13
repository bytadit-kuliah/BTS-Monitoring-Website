@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Buat Data BTS Baru</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">list BTS:</li>
    </ol> --}}
    <div class="row">
        <form action="/dashboard/edit-bts" method="post" class="mb-5" enctype="multipart/form-data">
            @csrf
            {{-- <div class="mb-3">
                <span id="id">
                </span>
            </div> --}}

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="namaBTS" class="form-label">Nama BTS</label>
                    <input type="text" class="form-control @error('namaBTS') is-invalid @enderror" id="namaBTS" name="namaBTS" required autofocus value="{{ old('namaBTS') }}">
                    @error('namaBTS')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="jenisBTS_id" class="form-label">Jenis BTS</label>
                    <select class="form-select" name="jenisBTS_id">
                        @foreach ($bts_type as $jenis_bts)
                            @if(old('jenisBTS_id') == $jenis_bts->id)
                                <option value="{{ $jenis_bts->id }}" selected>{{ $jenis_bts->jenisBTS }}</option>
                            @else
                                <option value="{{ $jenis_bts->id }}">{{ $jenis_bts->jenisBTS }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="owner_id" class="form-label">Pemilik</label>
                    <select class="form-select" name="owner_id">
                        @foreach ($owners as $owner)
                            @if(old('owner_id') == $owner->id)
                                <option value="{{ $owner->id }}" selected>{{ $owner->nama }}</option>
                            @else
                                <option value="{{ $owner->id }}">{{ $owner->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 mb-3">
                    <label for="lokasi" class="form-label">Alamat</label>
                    <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" required autofocus value="{{ old('lokasi') }}">
                    @error('lokasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label for="desa_id" class="form-label">Desa</label>
                    <select class="form-select" name="desa_id">
                        @foreach ($villages as $village)
                            @if(old('desa_id') == $village->id)
                                <option value="{{ $village->id }}" selected>{{ $village->nama }}</option>
                            @else
                                <option value="{{ $village->id }}">{{ $village->nama }}</option>
                            @endif
                        @endforeach
                    </select>

                </div>

                <div class="col-md-2 mb-3">
                    <label for="genset" class="form-label">Genset</label>
                    <select class="form-select @error('genset') is-invalid @enderror" id="genset" name="genset" required autofocus value="{{ old('genset') }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
                <div class="col-md-2 mb-3">
                    <label for="tembok_batas" class="form-label">Tembok Batas</label>
                    <select class="form-select @error('tembok_batas') is-invalid @enderror" id="tembok_batas" name="tembok_batas" required autofocus value="{{ old('tembok_batas') }}">
                        <option value="1">Ada</option>
                        <option value="0">Tidak Ada</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="panjang_tanah" class="form-label">Panjang Tanah</label>
                    <input type="number" class="form-control @error('panjang_tanah') is-invalid @enderror" id="panjang_tanah" name="panjang_tanah" required autofocus value="{{ old('panjang_tanah') }}">
                    @error('panjang_tanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="lebar_tanah" class="form-label">Lebar Tanah</label>
                    <input type="number" class="form-control @error('lebar_tanah') is-invalid @enderror" id="lebar_tanah" name="lebar_tanah" required autofocus value="{{ old('lebar_tanah') }}">
                    @error('lebar_tanah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <label for="tinggi_tower" class="form-label">Tinggi Tower</label>
                    <input type="number" class="form-control @error('tinggi_tower') is-invalid @enderror" id="tinggi_tower" name="tinggi_tower" required autofocus value="{{ old('tinggi_tower') }}">
                    @error('tinggi_tower')
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

            <div class="row">
                <div class="mb-3">
                    <label for="bts_photos" class="form-label @error('bts_photos') is-invalid @enderror">Foto-foto BTS</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="bts_photos" name="bts_photos" onchange="previewImage()" multiple>
                    @error('bts_photos')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-4">Tambah BTS</button>
        </form>
    </div>

    <script>
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
