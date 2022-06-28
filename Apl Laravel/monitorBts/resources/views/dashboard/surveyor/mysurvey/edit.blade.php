@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    @if($mysurvey->status == false)
        <h1 class="mt-4 border-3 rounded-3 border-bottom">Isi Survey <span class="fw-bolder">{{ $mysurvey->survey->name }}</span></h1>
    @else
        <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Jawaban Survey <span class="fw-bolder">{{ $mysurvey->survey->name }}</span></h1>
    @endif
    <div class="row">
        <form action="/dashboard/mysurveys/{{ $mysurvey->id }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            {{-- <div class="row">
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
                    <label for="provider_id" class="form-label">Provider</label>
                    <select class="js-example-basic-multiple" name="provider_id[]" multiple="multiple" style="width: 100%">
                        @foreach ($providers as $provider)
                            @if(old('provider_id', $btslist->provider_id) == $provider->id)
                                <option value="{{ $provider->id }}" selected>{{ $provider->nama }}</option>
                            @else
                                <option value="{{ $provider->id }}">{{ $provider->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> --}}

            {{-- <div class="row">
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
                        @foreach ($villages as $village)
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
            </div> --}}

            {{-- <div class="row">
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
            </div> --}}

            {{-- <div class="row">
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
            </div> --}}


            {{-- <div class="mb-3">
                <label for="images" class="form-label @error('images') is-invalid @enderror">BTS Photos</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input type="hidden" name="oldImages" id="oldImages" value="{{ $btsimgs }}" multiple>

                <input class="form-control" type="file" id="images" name="images[]" onchange="previewImage()" multiple>
                @error('images')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> --}}

            <input type="hidden" name="user_id" value="{{ old('user_id', $mysurvey->user_id) }}">
            <input type="hidden" name="btslist_id" value="{{ old('btslist_id', $mysurvey->btslist_id) }}">
            <input type="hidden" name="survey_id" value="{{ old('survey_id', $mysurvey->survey_id) }}">

            <div class="col-md-12 mb-3">
                <div class="container-fluid" id="questionbar">
                    @foreach ($mysurvey->survey->question as $key => $question)
                    @php
                    $q = $key
                    @endphp
                    <div class="row bg-light mb-3" id="questionlists">
                        {{-- <h5>{{ $question->question }}</h5>
                        <h5>{{ $offeredanswer->option }}</h5> --}}
                        <div class="row col-5">
                            <h4 class="fw-bold text-center mt-3"></h4>
                            {{-- <form class=" bg-white px-4" action=""> --}}
                                <p class="fw-bold fs-4" name="nama_survey">{{ $question->question }}</p>
                                <input type="hidden" name="question_id[{{$q}}]" id="question_id" value="{{ old('question_id', $question->id) }}">
                                {{-- <input class="fw-bold" name="question_id" value="{{ $question->question }}"> --}}

                                @foreach ($question->offeredanswer as $key => $offeredanswer)
                                  <div class="form-check mb-2 mx-4">
                                    <input class="form-check-input" name="offeredanswer_id[{{$q}}]" type="radio" value="{{ $offeredanswer->id }}" id="offeredanswer_id" >
                                    <label class="form-check-label" for="offeredanswer_id">
                                        {{ $offeredanswer->option }}
                                    </label>
                                  </div>
                                @endforeach
                                {{-- </form> --}}
                        </div>

                        {{-- <div class="row" id="answerbar">
                            <div class="row" id="jawaban">
                                <div class="d-inline p-2 m-2 col-lg-4">
                                    <input type="text" class="form-control @error('optionOne') is-invalid @enderror" placeholder="Add Answer Option" name="optionOne[]">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="text-end btn btn-success mt-4">Submit</button>
        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>

    // function previewImage() {
    //     const btsfoto = document.querySelector('#images');
    //     const imgPreview = document.querySelector('.img-preview');

    //     imgPreview.style.display = 'block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(btsfoto.files[0]);

    //     oFReader.onload = function (oFREvent) {
    //         imgPreview.src = oFREvent.target.result;
    //     }
    // }


</script>
@endsection

@section('page-scripts')
    <script>

        // function latitude( str ){
        //     var latInput = document.getElementById('latitude');
        //     if(str.length == 3){
        //         latInput.value = str+',';
        //     }
        // }
        // function longitude( str ){
        //     var longInput = document.getElementById('longitude');
        //     if(str.length == 2){
        //         longInput.value = str+',';
        //     }
        // }
        // $(document).ready(function() {
        //     $('.js-example-basic-multiple').select2();
        // });
    </script>
@endsection
