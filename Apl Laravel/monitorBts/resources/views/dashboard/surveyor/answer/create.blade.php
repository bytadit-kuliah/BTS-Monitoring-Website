@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kerjakan Survey</h1>
</div>

<div class="col-lg-12">
    <form action="/dashboard/answers" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="col-md-8 mb-3">
            <label for="survey_id" class="form-label">Nama Survey</label>
            <select class="form-select" name="survey_id">
                {{-- foreach($btslists as $btslist){
                    return $btslist->surveys;
                }//dapet data survey --}}
            @foreach ($monitorings as $monitoring)
                @foreach ($btslists->where('id', $monitoring->btslist_id) as $btslist)
                    @foreach ($btslist->surveys as $btslist_survey)
                        {{-- @if(old('survey_id') ==  $monitoring->id) --}}
                            {{-- <option value="{{  $btslist_survey->id }}" selected>{{ $ $btslist_survey->nama }}</option> --}}
                        {{-- @else --}}
                            {{-- <option value="{{  $btslist_survey->id }}">{{  $btslist_survey->name }}</option> --}}
                            <option value="{{  $btslist_survey->id }}">{{  $btslist_survey->name }}</option>

                            {{-- @endif --}}
                    @endforeach
                @endforeach
            @endforeach
            </select>
        </div>

        <div class="col-lg-8 mb-3">
            {{-- <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" required value="{{ old('description') }}"> --}}
            {{-- <div class="form-floating"> --}}
                <label for="description">Description</label>
                <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" required value="{{ old('description') }}" rows="5" style="height:100%;"></textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            {{-- </div> --}}
        </div>

        <div class="col-md-8 mb-3">
            <label for="btslist_id" class="form-label">Nama BTS</label>
            <select class="js-example-basic-multiple" name="btslist_id[]" multiple="multiple" style="width: 100%">
                @foreach ($btslists as $btslist)
                    @if(old('btslist_id') == $btslist->id)
                        <option value="{{ $btslist->id }}" selected>{{ $btslist->nama }}</option>
                    @else
                        <option value="{{ $btslist->id }}">{{ $btslist->nama }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-md-12 mb-3">
            <a href="#" class="Qnew btn btn-dark mb-3">Add a Question</a>
            <div class="container-fluid" id="questionbar">
                {{-- <div class="row bg-light mb-3" id="questionlists">
                        <div class="d-inline p-2 my-3 col-lg-11">
                            <input type="text" class="form-control" placeholder="Input question" name="addMoreInputFields[0][questions]">
                        </div>
                        <div class="d-inline p-2 my-3 col-lg-1">
                            <a href="#" class="Qdelete btn btn-danger">Delete</a>
                        </div>
                        <div class="row" id="answerbar">
                            <div class="row" id="jawaban"> --}}
                                {{-- <div class="d-inline p-2 m-2 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Add Answer Option" name="addMoreInputFields[0][answer]">
                                </div> --}}

                                {{-- <div class="d-inline p-2 m-2 col-lg-1">
                                    <a href="#" class="Adelete btn btn-danger">X</a>
                                </div> --}}

                                {{-- <div class="d-inline p-2 m-2 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt">
                                </div>
                                <div class="d-inline p-2 m-2 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt">
                                </div>
                                <div class="d-inline p-2 m-2 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt">
                                </div>
                                <div class="d-inline p-2 m-2 col-lg-4">
                                    <input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt">
                                </div>
                            </div>
                        </div> --}}

                        {{-- <div class="p-2 m-2 col-lg-12">
                            <a href="#" class="Anew btn btn-success">+</a>
                        </div> --}}
                {{-- </div> --}}



                <div class="row bg-light mb-3" id="questionlists">
                    <div class="d-inline p-2 my-3 col-lg-11">
                        <input type="text" class="form-control" placeholder="Input Question" name="question[0]">
                    </div>
                    <div class="d-inline p-2 my-3 col-lg-1">
                        <a href="#" class="Qdelete btn btn-danger">Delete</a>
                    </div>
                    @error('question')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                    <div class="row" id="answerbar">
                        <div class="row" id="jawaban">
                            <div class="d-inline p-2 m-2 col-lg-4">
                                <input type="text" class="form-control @error('optionOne') is-invalid @enderror" placeholder="Add Answer Option" name="optionOne[]">
                                @error('optionOne')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-inline p-2 m-2 col-lg-4">
                                <input type="text" class="form-control @error('optionTwo') is-invalid @enderror" placeholder="Add Answer Option" name="optionTwo[]">
                                @error('optionTwo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-inline p-2 m-2 col-lg-4">
                                <input type="text" class="form-control @error('optionThree') is-invalid @enderror" placeholder="Add Answer Option" name="optionThree[]">
                                @error('optionThree')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-inline p-2 m-2 col-lg-4">
                                <input type="text" class="form-control @error('optionFour') is-invalid @enderror" placeholder="Add Answer Option" name="optionFour[]">
                                @error('optionFour')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Input Data</button>
      </form>
</div>

<script>

    $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });

</script>
{{-- <script type="text/javascript">
    $(function() {
        $('a.Qnew').click(function(e) {
            e.preventDefault();
            $('#questionbar').append('<div class="row" id="questionlists"><div class="d-inline p-2 my-3 col-lg-11"><input type="text" class="form-control" placeholder="Input question" name="questions"></div><div class="d-inline p-2 my-3 col-lg-1"><a href="#" class="Qdelete btn btn-danger">Delete</a></div></div>');
        });
        $('a.Qdelete').click(function (e) {
            e.preventDefault();
            if ($('#questionbar input').length > 1) {
                $('#questionbar').children().last().remove();
            }
        });
    });
</script> --}}
{{-- <script type="text/javascript">
    var i = 0;
    $(".Qnew").click(function () {
        ++i;
        $("#questionbar").append('<div class="row bg-light mb-3" id="questionlists"><div class="d-inline p-2 my-3 col-lg-11"><input type="text" class="form-control" placeholder="Input question" name="addMoreInputFields[' + i +
            '][questions]"></div><div class="d-inline p-2 my-3 col-lg-1"><a href="#" class="Qdelete btn btn-danger">Delete</a></div><div class="row" id="answerbar"><div class="row"><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="addMoreInputFields[0][answer]"></div><div class="d-inline p-2 m-2 col-lg-1"><a href="#" class="Adelete btn btn-danger">X</a></div></div></div><div class="p-2 m-2 col-lg-12"><a href="#" class="Anew btn btn-success">+</a></div></div>'
            );
    });
    $(document).on('click', '.Qdelete', function () {
        $(this).parents('.row').remove();
    });
</script> --}}

{{-- <script type="text/javascript">
    var i = 0;
    $(".Qnew").click(function () {
        ++i;
        $("#questionbar").append('<div class="row bg-light mb-3" id="questionlists"><div class="d-inline p-2 my-3 col-lg-11"><input type="text" class="form-control" placeholder="Input question" name="addMoreInputFields[' + i +
            '][questions]"></div><div class="d-inline p-2 my-3 col-lg-1"><a href="#" class="Qdelete btn btn-danger">Delete</a></div><div class="row" id="answerbar"><div class="row" id="jawaban"><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="answerOpt"></div></div></div></div>'
            );
    });
    $(document).on('click', '.Qdelete', function () {
        $(this).parents('.row').remove();
    });
</script> --}}

{{-- <script type="text/javascript">
    var j = 0;
    $(".Anew").click(function () {
        ++j;
        $("#answerbar").append('<div class="row" id="jawaban"><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="addMoreInputFields['+ j +
                        '][answer]"></div><div class="d-inline p-2 m-2 col-lg-1"><a href="#" class="Adelete btn btn-danger">X</a></div></div>'
            );
    });
    $(document).on('click', '.Adelete', function () {
        $(this).parents('#jawaban').remove();
    });
</script> --}}

<script type="text/javascript">
    var i = 0;
    $(".Qnew").click(function () {
        ++i;
        $("#questionbar").append('<div class="row bg-light mb-3" id="questionlists"><div class="d-inline p-2 my-3 col-lg-11"><input type="text" class="form-control" placeholder="Input Question" name="question['+ i +
            ']"></div><div class="d-inline p-2 my-3 col-lg-1"><a href="#" class="Qdelete btn btn-danger">Delete</a></div><div class="row" id="answerbar"><div class="row" id="jawaban"><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionOne['+ i +
                ']"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionTwo['+ i +
                    ']"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionThree['+ i +
                        ']"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionFour['+ i +
                            ']"></div></div></div></div>'
        );
    });
    $(document).on('click', '.Qdelete', function () {
        $(this).parents('.row').remove();
    });
</script>

{{-- <script type="text/javascript">
    var i = 0;
    $(".Qnew").click(function () {
        ++i;
        $("#questionbar").append('<div class="row bg-light mb-3" id="questionlists"><div class="d-inline p-2 my-3 col-lg-11"><input type="text" class="form-control" placeholder="Input Question" name="question['+ i +
            ']"></div><div class="d-inline p-2 my-3 col-lg-1"><a href="#" class="Qdelete btn btn-danger">Delete</a></div><div class="row" id="answerbar"><div class="row" id="jawaban"><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionOne"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionTwo"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionThree"></div><div class="d-inline p-2 m-2 col-lg-4"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionFour"></div></div></div></div>'
        );
    });
    $(document).on('click', '.Qdelete', function () {
        $(this).parents('.row').remove();
    });
</script> --}}

@endsection
