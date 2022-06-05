@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Profil</h1>
    <form class="col">
        <div class="row-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-5 border border-2" src="https://thumbs.dreamstime.com/b/happy-office-guy-20610554.jpg" style="max-height:300px;max-width:300px">
                <span id='current-name' class="font-weight-bold">Paijo Last</span>
                <span id='current-address' class="text-black-50">280 W. St Louis Street Findlay, OH 45840</span>
            </div>
        </div>
        <div class="row border-right">
            <div class="p-3 py-5">
                {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profil</h4>
                </div> --}}
                <div class="row mt-3">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for='firstName'>Nama Depan</label>
                        <input id='firstName' type="text" class="form-control" placeholder="masukkan nama depan..." value="">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for='lastName'>Nama Belakang</label>
                        <input id='lastName' type="text" class="form-control" placeholder="masukkan nama belakang..." value="">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for='alamat'>Alamat</label>
                        <input id='alamat' type="text" class="form-control" placeholder="masukkan alamat Anda..." value="">
                    </div>
                    <div class="col-md-12">
                        <label for="image" class="form-label @error('image') is-invalid @enderror">Foto Profil</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5 rounded-5" style="max-height:300px;max-width:300px">
                        <input class="form-control" type="file" id="foto_admin" name="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                </div>
                <div class="mt-5 text-center">
                    <button id='updateProfile' class="btn btn-primary profile-button" type="button">Save Profile</button>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                <div class="col-md-12"><label class="labels">Experience in Designing</label><input type="text" class="form-control" placeholder="experience" value=""></div> <br>
                <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" placeholder="additional details" value=""></div>
            </div>
        </div> --}}
    </form>
@endsection
<!-- Main Akhir -->

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

        function previewImage() {
            const image = document.querySelector('#foto_admin');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

    </script>

@endsection