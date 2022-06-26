@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Data Survey</h1>
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Survey aktif:</li>
    </ol> --}}
    <div class="d-flex flex-wrap survey-cards" style="justify-content:space-evenly;">
        @foreach ($surveys as $survey)
        <div class="card text-white bg-warning border-3 survey-card" style="max-width: 18rem; margin:10px">
            <h3 class="card-header">{{ $survey->name }}</h3>
            <div class="card-body">
                {{-- <h6 class="card-title">{{ $survey->name }}</h6> --}}
                <p class="card-text">{{ $survey->description }}</p>
                {{-- <div class="d-flex" style="justify-content: flex-end;">
                    <a class="text-black-50" href="/dashboard/show-survey" class="card-link">Lihat</a>
                    <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                </div> --}}
            </div>
            <form action="/dashboard/surveys/{{ $survey->id }}" method="post" class="badge bg-danger border-0">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></button>
            </form>
        </div>
        @endforeach
        <div class="card text-black bg-light border-3 add-card survey-card" style="width: 18rem; margin:10px">
            <h3 class="card-header">Tambah Survey</h3>
            <div class="card-body d-flex" style="justify-content: center;">
                <a class="text-black" style="font-size: 6em; align-self: center;" href="/dashboard/surveys/create" class="card-link">+</a>
            </div>
        </div>
    </div>
@endsection
<!-- Main Akhir -->
