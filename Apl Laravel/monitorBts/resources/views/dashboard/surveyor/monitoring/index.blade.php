@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Data Monitoring</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List Data Monitoring:</li>
    </ol>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif


    <div class="table-responsive col-lg-12">
    <a href="/dashboard/monitorings/create"  class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Add New</a>
    <table class="table fixedTable text-center">
        <thead class="bg-bts-3 text-center text-light">
            <tr>
                <th style='width:3.8%; border-top-left-radius:1rem'>No</th>
                <th style='width:15%'>Nama Monitoring</th>
                <th style='width:15%'>Nama BTS</th>
                <th style='width:15%'>Waktu Monitoring</th>
                <th style="width:50%">Catatan</th>
                <th style='width:70px; border-top-right-radius:1rem'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monitorings->where('user_id', auth()->user()->id) as $monitoring)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $monitoring->nama }}</td>
                <td>{{ $monitoring->btslist->nama }}</td>
                <td>{{ $monitoring->waktu_monitoring }}</td>
                <td> {!! $monitoring->catatan !!}</td>
                <td class='text-center align-middle'>
                    <a href="/dashboard/monitorings/{{ $monitoring->id }}/edit" class="edit badge bg-warning" title="Edit" data-toggle="tooltip">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="/dashboard/monitorings/{{ $monitoring->id }}" method="post" class="border-0">
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
<!-- Main Akhir -->

@section('page-scripts')
@endsection
