@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row mb-5">
        <div class="col-lg-12 justify-content-center text-center">
            <h1 class="mb-3">Data Surveyor {{ $user->name }}</h1>

           <a href="/dashboard/users"  class="btn btn-success add-new" style="background: #52784F; color: #fff"><span data-feather='arrow-left'></span>Back</a>
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
               <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->firstName }}" class="mw-50 rounded-5 img-fluid mb-5 mt-3">
           </div>
           @else
           <img src="https://source.unsplash.com/300x300?person" alt="{{ $user->firstName }}" class="mw-75 rounded-5 img-fluid mb-5 mt-3">
           @endif

           

           <table class="table ">
            <thead class="table-success ">
                <th style='border-top-left-radius:1rem'>
                    Keterangan
                </th>
                <th style='border-top-right-radius:1rem'>
                    Nilai
                </th>
            </thead>
            <tbody>
                <tr>
                    <td class='table-light w-25'>Nama</td>
                    <td> {{ $user->firstName . ' ' . $user->lastName }} </td>
                </tr>
                <tr>
                    <td class='table-light'>E-mail</td>
                    <td> {{ $user->email }} </td>
                </tr>
                <tr>
                    <td class='table-light'>Nomor Telepon</td>
                    <td> {{ $user->noTelp }}</td>
                </tr>
                <tr>
                    <td class='table-light'>Alamat</td>
                    <td> {{ $user->alamat }} </td>
                </tr>
                <tr>
                    <td class='table-light'>Jumlah Survey</td>
                    <td>  {{ $user->jmlSurvey }} </td>
                </tr>
            </tbody>
        </table>

        </div>
    </div>
</div>
@endsection
