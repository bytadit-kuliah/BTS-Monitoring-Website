@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Data Provider BTS</h1>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif


    <div class="table-responsive col-lg-12">
    <a href="/dashboard/providers/create"   class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Add New</a>
    <table class="table fixedTable text-center">
        <thead class="bg-bts-3 text-light">
            <tr>
                <th style='width:3.8%;border-top-left-radius:1rem'>No</th>
                <th style='width:10%'>Foto</th>
                <th style='width:16%'>Nama</th>
                <th style='width:35%'>Alamat</th>
                <th style='width:10%'>No.Telepon</th>
                <th style='width:%'>List BTS</th>
                <th style='width:70px;border-top-right-radius:1rem'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($providers as $provider)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($provider->foto)
                    <div style="max-height: 150px; text-align:center;max-width:150px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $provider->foto) }}" alt="{{ $provider->nama }}" class="img-fluid mt-3" style='width:100px; height:100px'>
                    </div>
                    @else
                    <div style="max-height: 150px; text-align:center;max-width:150px; overflow:hidden;">
                        <img src="https://source.unsplash.com/100x100?tower" alt="{{ $provider->name }}" class="img-thumbnail">
                    </div>
                    @endif
                </td>
                <td>{{ $provider->nama }}</td>
                <td class='text-start'>{{ $provider->alamat }}</td>
                <td>{{ $provider->noTelp }}</td>
                <td class='text-start'>
                    @if($provider->btslists)
                        <ul>
                            @foreach($provider->btslists as $btslistProvider)
                                <li>{{ $btslistProvider->nama }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>None</p>
                    @endif
                </td>
                <td class='text-center align-middle'>
                    <a href="/dashboard/providers/{{ $provider->id }}/edit" class="edit badge bg-warning" title="Edit" data-toggle="tooltip">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/dashboard/providers/{{ $provider->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>
@endsection
@section('page-scripts')
@endsection
