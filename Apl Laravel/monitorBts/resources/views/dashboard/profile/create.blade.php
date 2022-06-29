@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <form class="col mb-5" action="/dashboard/users" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="row-md-3 border-right">
        </div>
        <div class="row border-right">
            <div class="p-3 py-5">
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
                    <div class="mb-3 col-md-12">
                        <label for="photo" class="form-label @error('photo') is-invalid @enderror">Foto Profil</label>

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
        <div class="mt-5 text-center">
            <button type="submit"  class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Tambah</button>
        </div>
    </form>
@endsection
<!-- Main Akhir -->

@section('page-scripts')

    <script>

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
