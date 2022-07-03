@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Data User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Administrator dan Surveyor </li>
    </ol>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="table-responsive col-lg-12">
    <table class="table fixedTable text-center">
        <thead class="bg-bts-3 text-center text-light">
            <tr>
                <th style='width:3.8%; border-top-left-radius:1rem'>No</th>
                <th style='width:10%'>Foto</th>
                <th style='width:10%'>Nama</th>
                <th style='width:'>E-mail</th>
                <th style='width:30%'>Alamat</th>
                <th style='width:10%'>No.Telepon</th>
                <th style='width:10%'>Role</th>
                <th style='width:70px;border-top-right-radius:1rem'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($user->photo)
                    <div style="max-height: 150px; text-align:center;max-width:150px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->firstName }}" class="img-thumbnail" style='width:100px; height:100px'>
                    </div>
                    @else
                    <div style="max-height: 150px; text-align:center;max-width:150px; overflow:hidden;">
                        <img src="https://source.unsplash.com/100x100?person" alt="{{ $user->firstName }}" class="img-thumbnail">
                    </div>
                    @endif
                </td>
                <td>{{ $user->firstName . ' ' . $user->lastName }}</td>
                <td>{{ $user->email }}</td>
                <td class='text-start'>{{ $user->alamat }}</td>
                <td>{{ $user->noTelp }}</td>

                @if($user->is_admin)
                    <td>Administrator</td>
                @else
                    <td>Surveyor</td>
                @endif

                <td class="text-center">
                    <a href="/dashboard/users/{{ $user->id }}" class="show badge bg-success" title="Show" data-toggle="tooltip">
                        <i class="bi bi-eye-fill"></i>
                    </a>

                    @if(!$user->is_admin)
                        <form action="/dashboard/users/{{ $user->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></button>
                        </form>
                    @endif

                    @if(!$user->is_admin)
                        <a href="/dashboard/users/{{ $user->id }}/promote" class="promote badge bg-warning" title="Promote" data-toggle="tooltip"onclick="return confirm('yakin promote?')">
                            <i class="bi bi-star-fill"></i>
                        </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>
@endsection
<!-- Main Akhir -->

@section('page-scripts')
@endsection
