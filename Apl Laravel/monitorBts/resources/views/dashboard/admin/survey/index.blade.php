@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Survey</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Survey aktif:</li>
    </ol>
    <div class="d-flex flex-wrap survey-cards" style="justify-content:space-evenly;">
        <div class="card text-white bg-warning border-3 survey-card" style="max-width: 18rem; margin:10px">
                <h3 class="card-header">ID Survey</h3>
                <div class="card-body">
                <h6 class="card-title">topik survey</h6>
                <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                <div class="d-flex" style="justify-content: flex-end;">
                    <a class="text-black-50" href="/dashboard/show-survey" class="card-link">Lihat</a>
                    <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                </div>
            </div>
        </div>
        <div class="card text-white bg-warning border-3 survey-card" style="max-width: 18rem; margin:10px">
                <h3 class="card-header">ID Survey</h3>
                <div class="card-body">
                <h6 class="card-title">topik survey</h6>
                <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                <div class="d-flex" style="justify-content: flex-end;">
                    <a class="text-black-50" href="/dashboard/show-survey" class="card-link">Lihat</a>
                    <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                </div>
            </div>
        </div>
        <div class="card text-white bg-warning border-3 survey-card" style="max-width: 18rem; margin:10px">
                <h3 class="card-header">ID Survey</h3>
                <div class="card-body">
                <h6 class="card-title">topik survey</h6>
                <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                <div class="d-flex" style="justify-content: flex-end;">
                    <a class="text-black-50" href="/dashboard/show-survey" class="card-link">Lihat</a>
                    <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                </div>
            </div>
        </div>
        <div class="card text-white bg-warning border-3 survey-card" style="max-width: 18rem; margin:10px">
                <h3 class="card-header">ID Survey</h3>
                <div class="card-body">
                <h6 class="card-title">topik survey</h6>
                <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                <div class="d-flex" style="justify-content: flex-end;">
                    <a class="text-black-50" href="/dashboard/show-survey" class="card-link">Lihat</a>
                    <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                </div>
            </div>
        </div>
        <div class="card text-white bg-warning border-3 survey-card" style="max-width: 18rem; margin:10px">
                <h3 class="card-header">ID Survey</h3>
                <div class="card-body">
                <h6 class="card-title">topik survey</h6>
                <p class="card-text">Deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey deskripsi survey.</p>
                <div class="d-flex" style="justify-content: flex-end;">
                    <a class="text-black-50" href="/dashboard/show-survey" class="card-link">Lihat</a>
                    <!-- <a href="#" class="card-link">Edit Jawaban</a> -->
                </div>
            </div>
        </div>
        <div class="card text-black bg-light border-3 add-card survey-card" style="width: 18rem; margin:10px">
                <h3 class="card-header">Tambah Survey</h3>
                <div class="card-body d-flex" style="justify-content: center;">
                    <a class="text-black" style="font-size: 6em; align-self: center;" href="/dashboard/create-survey" class="card-link">+</a>
                </div>
        </div>
    </div>
@endsection
<!-- Main Akhir -->