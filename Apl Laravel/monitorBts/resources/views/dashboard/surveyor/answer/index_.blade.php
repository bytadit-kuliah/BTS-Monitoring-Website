@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Isi Survey</h1>
    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container-fluid bg-light">
        <div class="row">
            {{-- <div class="col-md-8 mb-3">
                <label for="btslist_id" class="form-label">Nama BTS</label>
                <select class="form-select" name="btslist_id">
                    @foreach ($monitorings as $monitoring)
                        @if(old('btslist_id') == $monitoring->id)
                            <option value="{{ $monitoring->id }}" selected>{{ $monitoring->nama }}</option>
                        @else
                            <option value="{{ $monitoring->id }}">{{ $monitoring->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}

            {{-- <div class="col-md-2 mb-3">
                <label for="village_id" class="form-label">Desa</label>
                <select class="form-select" name="village_id" >
                @foreach ($villages as $village)
                        @if(old('village_id') == $village->id)
                            <option value="{{ $village->id }}" selected>{{ $village->nama }}</option>
                        @else
                            <option value="{{ $village->id }}">{{ $village->nama }}</option>
                        @endif
                    @endforeach
                </select>
            </div> --}}
            <a href="/dashboard/answers/create" type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Add New</a>
            <div class="col-lg-8 col-mb-3 mt-3">
                <h5>Survey yang telah diisi:</h5>
            </div>
            @foreach ($monitorings as $monitoring)
                @foreach ($btslists->where('id', $monitoring->btslist_id) as $btslist)
                    @foreach ($btslist->surveys as $btslist_survey)
                        <div class="col-md-4 col-mb-3 p-3">
                            <div class="card bg-white p-2 text-center rounded-4">

                                <h3 class="card-title"><a href="/dashboard/answers/show" class="text-decoration-none text-dark">{{ $btslist_survey->name . ' ' . $btslist->nama }}</a></h3>
                                <input type="hidden" name="survey_id" value="{{  $btslist_survey->id }}">
                                {{-- <a href="/dashboard/btslists/{{ $btslist->id }}/edit" class="badge bg-warning">
                                    <i class="bi bi-pen-fill"></i>
                                </a> --}}
                                {{-- @if(old('survey_id') ==  $monitoring->id) --}}
                                {{-- <option value="{{  $btslist_survey->id }}" selected>{{ $ $btslist_survey->nama }}</option> --}}
                            {{-- @else --}}
                                {{-- <option value="{{  $btslist_survey->id }}">{{  $btslist_survey->name }}</option> --}}
                                {{-- <option value="{{  $btslist_survey->id }}">{{  $btslist_survey->name }}</option> --}}

                                {{-- @endif --}}
                            </div>
                        </div>
                    @endforeach
                @endforeach
            @endforeach
        </div>
    </div>

@endsection
<!-- Main Akhir -->
