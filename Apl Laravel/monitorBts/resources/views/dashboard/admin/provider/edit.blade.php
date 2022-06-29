@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Provider {{ $provider->nama }}</h1>
</div>

<div class="col-lg-12">
    <form action="/dashboard/providers/{{ $provider->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Provider</label>
          <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required autofocus value="{{ old('nama', $provider->nama) }}">
          @error('nama')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" required value="{{ old('alamat', $provider->alamat) }}">
            @error('alamat')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="noTelp" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('noTelp') is-invalid @enderror" id="noTelp" name="noTelp" required autofocus value="{{ old('noTelp', $provider->noTelp) }}">
            @error('noTelp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
          </div>

        <div class="mb-3">
            <label for="foto" class="form-label @error('foto') is-invalid @enderror">Foto Provider</label>

            <input type="hidden" name="oldFoto" id="oldFoto" value="{{ $provider->foto }}">
            @if($provider->foto)
            <img src="{{ asset('storage/' . $provider->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

            <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
            @error('foto')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success add-new" style="background: #52784F; color: #fff">Update Data</button>
      </form>
</div>

<script>

    function previewImage() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
