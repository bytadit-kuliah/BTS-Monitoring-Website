@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Monitoring {{ $monitoring->nama }}</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/monitorings/{{ $monitoring->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Monitoring</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $monitoring->nama) }}">
          @error('nama')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="col-md-2 mb-3">
            <label for="btslist_id" class="form-label">Pilih BTS</label>
            <select class="form-select" name="btslist_id" style="width:400px">
                {{-- Post::where('user_id', auth()->user()->id)->get() --}}
                @foreach ($btslists as $btslist)
                {{-- @foreach ($btslists->where('kecamatan_id', $selectedKecamatan) as $btslist) --}}
                    @if(old('btslist_id', $monitoring->btslist_id) == $btslist->id)
                        <option value="{{ $btslist->id }}" selected>{{ $btslist->nama }}</option>
                    @else
                        <option value="{{ $btslist->id }}">{{ $btslist->nama }}</option>
                    @endif
                @endforeach
            </select>
            {{-- <h5>{{ print_r(old('kecamatan_id')) }}</h5> --}}
        </div>

        <div class="mb-3">
            <label for="waktu_monitoring" class="form-label">Waktu Monitoring</label>
            <input type="date" class="form-control @error('waktu_monitoring') is-invalid @enderror" id="waktu_monitoring" name="waktu_monitoring" required autofocus value="{{ old('waktu_monitoring', $monitoring->waktu_monitoring) }}">
            @error('waktu_monitoring')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- <div class="mb-3">
            <label for="catatan" class="form-label">Catatan Monitoring</label>
            <input type="text" class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" required autofocus value="{{ old('catatan', $monitoring->catatan) }}">
            @error('catatan')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div> --}}

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan Monitoring</label>
            @error('catatan')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="catatan" type="hidden" name="catatan" value="{{ old('catatan', $monitoring->catatan) }}">
            <trix-editor input="catatan"></trix-editor>
        </div>


        {{-- <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" name="category_id">
            @foreach ($categories as $category)
                @if(old('category_id') == $category->id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
            @endforeach
            </select>
        </div> --}}
        {{-- <div class="mb-3">
            <label for="foto" class="form-label @error('foto') is-invalid @enderror">Foto monitoring</label>

            <input type="hidden" name="oldFoto" id="oldFoto" value="{{ $monitoring->foto }}">
            @if($monitoring->foto)
            <img src="{{ asset('storage/' . $monitoring->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

            <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
            @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div> --}}

        <button type="submit" class="btn btn-success add-new" style="background: #52784F; color: #fff">Update Data</button>
      </form>
</div>

<script>
    // const nama = document.querySelector('#nama');
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
    //     const foto = document.querySelector('#foto');
    //     const imgPreview = document.querySelector('.img-preview');

    //     imgPreview.style.display = 'block';

    //     const oFReader = new FileReader();
    //     oFReader.readAsDataURL(foto.files[0]);

    //     oFReader.onload = function (oFREvent) {
    //         imgPreview.src = oFREvent.target.result;
    //     }
    // }

    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    });

</script>

@endsection
