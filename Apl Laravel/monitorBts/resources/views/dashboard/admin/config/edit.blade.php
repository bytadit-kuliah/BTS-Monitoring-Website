@extends('dashboard.layouts.main')

@section('container')
<h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Config</h1>

@if(session()->has('success'))
<div class="alert alert-success col-lg-12" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="col-lg-12">
    <form action="/dashboard/configs/{{ $configs->id }}" method="post" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
          <label for="company" class="form-label">Nama Company</label>
          <input type="text" class="form-control @error('company') is-invalid @enderror" id="company" name="company" required autofocus value="{{ old('company', $configs->company) }}">
          @error('company')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="sidebar_logo" class="form-label @error('sidebar_logo') is-invalid @enderror">Logo Company</label>

            <input type="hidden" name="oldsidebar_logo" id="oldsidebar_logo" value="{{ $configs->sidebar_logo }}">
            @if($configs->sidebar_logo)
            <img src="{{ asset('storage/' . $configs->sidebar_logo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif

            <input class="form-control" type="file" id="sidebar_logo" name="sidebar_logo" onchange="previewImage()">
            @error('sidebar_logo')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="button-container justify-content-center d-flex">
            <button type="submit" class="btn btn-success add-new" style="background: #52784F; color: #fff">Update Data</button>
        </div>
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

    function previewImage() {
        const sidebar_logo = document.querySelector('#sidebar_logo');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(sidebar_logo.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
