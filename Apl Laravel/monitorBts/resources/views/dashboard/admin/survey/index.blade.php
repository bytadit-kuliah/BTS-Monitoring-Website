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
    <div class="d-flex flex-wrap survey-cards" style="justify-content:space-evenly;">
        @foreach ($surveys as $key=>$survey)
        <div class="card text-white bg-bts-3 border-3 survey-card" style="width: 18rem; margin:10px">
            <h3 class="card-header">{{ $survey->name }}</h3>
            <div class="card-body scroll">
                <p class="card-text">{{ $survey->description }}</p>
            </div>
            <p class='card-header text-end text-light'><span class='fw-bolder text-light'>{{$survey->question->count()}}</span> pertanyaan</p>
            <form action="/dashboard/surveys/{{ $survey->id }}" method="post" class="card-footer text-center ">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0 " title="Delete" data-toggle="tooltip" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></button>
            </form>
        </div>
        @endforeach
        <div class="card text-black bg-primary text-white border-3 add-card survey-card" style="width: 18rem; margin:10px">
            <h3 class="card-header">Tambah Survey</h3>
            <a class="card-body card-link d-flex mb-5" style="justify-content: center;" href="/dashboard/surveys/create">
                <div class="text-white" style="font-size: 6em; align-self: center;">+</div>
            </a>
        </div>
    </div>
@endsection
<!-- Main Akhir -->
