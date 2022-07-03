@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Survey Saya</h1>
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <h5 class="mt-4 border-3 rounded-3 border-bottom">Telah dikerjakan: </h5>
    <div class="d-flex flex-wrap survey-cards" style="justify-content:space-evenly;">
        @foreach ($mysurveys->where('user_id', auth()->user()->id)->where('status', true) as $mysurvey)
        <div class="card text-white bg-bts-3 border-3 survey-card" style="width: 18rem; margin:10px">
            <h3 class="card-header">{{ $mysurvey->survey->name }}</h3>
            <div class="card-body scroll">
                <p class="card-text">{{ $mysurvey->survey->description }}</p>
            </div>
            <p class='card-header text-first text-light'><span class='fw-bolder text-light'>{{ 'BTS ' . $mysurvey->btslist->nama }}</span></p>
            <p class='card-header text-end text-light'><span class='fw-bolder text-light'>{{$mysurvey->survey->question->count()}}</span> pertanyaan</p>
            <a href="/dashboard/mysurveys/{{ $mysurvey->id }}/edit" class="btn btn-light" title="Edit" data-toggle="tooltip">
                <h6>Edit Jawaban</h6>
            </a>
        </div>
        @endforeach
    </div>

    <h5 class="mt-4 border-3 rounded-3 border-bottom">Belum Dikerjakan: </h5>
    <div class="d-flex flex-wrap survey-cards" style="justify-content:space-evenly;">
        @foreach ($mysurveys->where('user_id', auth()->user()->id)->where('status', false) as $mysurvey)
        <div class="card text-white bg-danger border-3 survey-card" style="width: 18rem; margin:10px">
            <h3 class="card-header">{{ $mysurvey->survey->name }}</h3>
            <div class="card-body scroll">
                <p class="card-text">{{ $mysurvey->survey->description }}</p>
            </div>
            <p class='card-header text-first text-light'><span class='fw-bolder text-light'>{{ 'BTS ' . $mysurvey->btslist->nama }}</span></p>
            <p class='card-header text-end text-light'><span class='fw-bolder text-light'>{{$mysurvey->survey->question->count()}}</span> pertanyaan</p>
            <a href="/dashboard/mysurveys/{{ $mysurvey->id }}/edit" class="btn btn-light" title="Isi Survey" data-toggle="tooltip">
                <h6 class="text-dark text-center">Isi Survey</h6>
            </a>
        </div>
        @endforeach
    </div>
@endsection
<!-- Main Akhir -->
