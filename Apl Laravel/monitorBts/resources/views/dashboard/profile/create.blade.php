@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Add New Surveyor</h1>
    {{-- @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}
    <form class="col mb-5" action="/dashboard/users" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row-md-3 border-right">
            {{-- <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                @if($user->photo)
                    <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                        <img name="photoAdmin" id="photoAdmin" src="{{ asset('storage/' . $user->photo) }}" alt="foto admin" class="rounded-5 border border-2" style="max-height:300px;max-width:300px">
                    </div>
                @else
                    <img class="rounded-5 border border-2" src="https://thumbs.dreamstime.com/b/happy-office-guy-20610554.jpg" style="max-height:300px;max-width:300px">
                @endif
                <span id='fullName' class="font-weight-bold">{{ $user->firstName . ' ' . $user->lastName }}</span>

                @if($user->is_admin)
                    <span id='current-address' class="text-black-50">Administrator</span>
                @else
                    <span id='current-address' class="text-black-50">Surveyor</span>
                @endif
            </div> --}}
        </div>
        <div class="row border-right">
            <div class="p-3 py-5">
                {{-- <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profil</h4>
                </div> --}}
                <div class="row mt-3">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='username'>Username</label>
                        <input id='username' name="username" type="text" class="form-control @error('username') is-invalid @enderror" placeholder="masukkan username..." required value="{{ old('username') }}" autocomplete="username" autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='firstName'>Nama Depan</label>
                        <input id='firstName' name="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" placeholder="masukkan nama depan..." required value="{{ old('firstName') }}" autocomplete="firstName" autofocus>
                        @error('firstName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for='lastName'>Nama Belakang</label>
                        <input id='lastName' type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" placeholder="masukkan nama belakang..." required value="{{ old('lastName') }}" autocomplete="lastName" autofocus>
                        @error('lastName')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='noTelp'>Nomor Telepon</label>
                        <input id='noTelp' type="text" name="noTelp" class="form-control @error('noTelp') is-invalid @enderror" placeholder="masukkan Nomor Telepon Anda..." required value="{{ old('noTelp') }}" autocomplete="noTelp" autofocus>
                        @error('noTelp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-8 mb-3">
                        <label class="form-label" for='alamat'>Alamat</label>
                        <input id='alamat' type="text" name="alamat" class="form-control @error('alamat') is-invalid @enderror" placeholder="masukkan alamat Anda..." value="{{ old('alamat') }}" autocomplete="alamat" autofocus>
                        @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='email'>E-mail</label>
                        <input id='email' type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="masukkan email Anda..." required value="{{ old('email') }}" autocomplete="email" autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label" for='noTelp'>Password</label>
                        <input id='password' name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="masukkan Password Anda..." required autocomplete="current-password" autofocus>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="password">Confirm Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password_confirmation" placeholder="konfirmasi Password"  required autocomplete="current-password" autofocus>
                      </div>

                    {{-- <div class="col-md-12">
                        <label for="image" class="form-label @error('image') is-invalid @enderror">Foto Profil</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5 rounded-5" style="max-height:300px;max-width:300px">
                        <input class="form-control @error('nama') is-invalid @enderror" type="file" id="foto_admin" name="image" onchange="previewImage()">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div> --}}
                    <div class="mb-3 col-md-12">
                        <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto Profil</label>
                        {{-- @if($user->photo)
                        <img src="{{ asset('storage/' . $user->photo) }}" class="img-preview img-fluid mb-3 col-sm-5 rounded-5" style="max-height:300px;max-width:300px">
                            @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif --}}

                        {{-- <input type="hidden" name="oldPhoto" id="oldPhoto" value="{{ old('photo') }}"> --}}
                        <input class="form-control" type="file" id="photo" name="photo" onchange="previewImage()" value="{{ old('photo') }}">
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

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
        <div class="mt-5 text-center">
            <button type="submit" class="btn btn-success">Save Profile</button>
        </div>
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
        const photo = document.querySelector('#photo');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(photo.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    </script>

@endsection
