@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    @if($mysurvey->status == false)
        <h1 class="mt-4 border-3 rounded-3 border-bottom">Isi Survey <span class="fw-bolder fs-2 text-danger">{{ '('.$mysurvey->survey->name.')' }}</span></h1>
    @else
        <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Jawaban Survey <span class="fw-bolder fs-2 text-bts-3">{{ '('.$mysurvey->survey->name.')' }}</span></h1>
    @endif
    <div class="row">
        <div class="button-container justify-content-center d-flex">
            <a href="/dashboard/mysurveys" class="btn btn-success add-new mb-3 text-center" style="background: #52784F; color: #fff"><span data-feather='arrow-left'></span>Back</a>
        </div>
           <form action="/dashboard/mysurveys/{{ $mysurvey->id }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="user_id" value="{{ old('user_id', $mysurvey->user_id) }}">
            <input type="hidden" name="btslist_id" value="{{ old('btslist_id', $mysurvey->btslist_id) }}">
            <input type="hidden" name="survey_id" value="{{ old('survey_id', $mysurvey->survey_id) }}">

            <div class="col-md-12 mb-3">
                <div class="container-fluid" id="questionbar">
                    @foreach ($mysurvey->survey->question as $key => $question)
                    @php
                    $q = $key
                    @endphp
                    <div class="row mb-4 rounded-5" id="questionlists">
                        <div class="col-lg-12">
                                <p class="card-header {{$mysurvey->status ? 'bg-bts-3' : 'bg-danger'}} text-white fw-bold fs-4 text-center " name="nama_survey">{{ $question->question }}</p>
                                <input type="hidden" name="question_id[{{$q}}]" id="question_id" value="{{ old('question_id', $question->id) }}">
                                <div class="card-body bg-light rounded-bottom border-bottom border-5">
                                    @if($mysurvey->status==false)
                                        @foreach ($question->offeredanswer as $key => $offeredanswer)
                                            <div class="form-check mb-2 ">
                                                <input class="form-check-input" name="offeredanswer_id[{{$q}}]" type="radio" value="{{ $offeredanswer->id }}" id="offeredanswer_id[{{$q.'-'.$loop->iteration}}]" required>
                                                <label class="form-check-label" for="offeredanswer_id[{{$q.'-'.$loop->iteration}}]">
                                                    {{ $offeredanswer->option }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @else
                                        @foreach ($question->offeredanswer as $key => $offeredanswer)
                                            <?php $counter=$loop->iteration?>
                                            <div class="form-check mb-2 ">
                                                @foreach (Auth::user()->answer as $key => $question)
                                                    @if($question->offeredanswer_id == $offeredanswer->id)
                                                        <input class="form-check-input" name="offeredanswer_id[{{$q}}]" type="radio" value="{{ $offeredanswer->id }}" id="offeredanswer_id[{{$q.'-'.$counter}}]" checked required >
                                                        <label class="form-check-label" for="offeredanswer_id[{{$q.'-'.$counter}}]">
                                                            {{ $offeredanswer->option }}
                                                        </label>
                                                        @break
                                                    @elseif($loop->last)
                                                        <input class="form-check-input" name="offeredanswer_id[{{$q}}]" type="radio" value="{{ $offeredanswer->id }}" id="offeredanswer_id[{{$q.'-'.$counter}}]" required>
                                                        <label class="form-check-label" for="offeredanswer_id[{{$q.'-'.$counter}}]">
                                                            {{ $offeredanswer->option }}
                                                        </label>
                                                        @break
                                                    @endif
                                                @endforeach

                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="button-container justify-content-center d-flex">
                        <button type="submit" class=" btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
</script>
@endsection

@section('page-scripts')
    <script>
    </script>
@endsection
