@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8">
            <h1 class="mb-3">Data Surveyor {{ $user->name }}</h1>

           <a href="/dashboard/users" class="btn btn-success"><span data-feather='arrow-left'></span>Back</a>
           @can('admin')
           {{-- <a href="/dashboard/users/{{ $user->id }}/edit" class="btn btn-warning"><span data-feather='edit'></span>Edit Data</a> --}}
           <form action="/dashboard/users/{{ $user->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span>Delete</button>
           </form>
           @endcan
           <br>
           {{-- @if($users)
            @foreach ($users as $user) --}}
                {{-- <div style="max-height: 200px; max-width:400px; overflow:hidden; display:inline-block;">
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="img-fluid mt-3">
                </div> --}}
            {{-- @endforeach
           @else --}}
               {{-- <img src="https://source.unsplash.com/400x200?{{ $user->btstype->type }}" alt="{{ $user->btstype->type }}" class="img-fluid mt-3">
           @endif --}}

           @if($user->photo)
           <div style="max-height: 150px; max-width:150px; overflow:hidden;">
               <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->firstName }}" class="w-75 rounded-5 img-fluid mb-5 mt-5">
           </div>
           @else
           <img src="https://source.unsplash.com/100x100?person" alt="{{ $user->firstName }}" class="img-fluid mt-3">
           @endif
           <ul>
                {{-- <li>
                    <h5 class="mb-2">Nama : {{ $user->nama }}</h5>
                </li> --}}
                <li>
                    <h5 class="mb-2">Nama : {{ $user->firstName . ' ' . $user->lastName }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">E-mail : {{ $user->email }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">No Telepon : {{ $user->noTelp }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Alamat : {{ $user->alamat }}</h5>
                </li>
                <li>
                    <h5 class="mb-2">Jumlah Survey : {{ $user->jmlSurvey }}</h5>
                </li>
            </ul>

        </div>
    </div>
</div>
@endsection
