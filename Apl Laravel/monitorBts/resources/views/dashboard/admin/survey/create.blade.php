@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Buat Survey Baru</h1>
</div>

<div class="col-lg-12">
    <form action="/dashboard/surveys" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-12 mb-3">
          <label for="name" class="form-label">Nama Survey</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
          @error('name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
          @enderror
        </div>
        <div class="col-lg-12 mb-3">

                <label for="description">Description</label>
                <textarea class="form-control  @error('description') is-invalid @enderror" id="description" name="description" required value="{{ old('description') }}" rows="5" style="height:100%;"></textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

        </div>

        <div class="col-md-12 mb-3">
            <label for="btslist_id" class="form-label">Nama BTS</label>
            <select id="bts_select" class="js-example-basic-multiple" name="btslist_id[]" multiple="multiple" style="width: 100%" required>
                @foreach ($btslists as $btslist)
                    @if(old('btslist_id') == $btslist->id)
                        <option value="{{ $btslist->id }}" selected>{{ $btslist->nama }}</option>
                    @else
                        <option value="{{ $btslist->id }}">{{ $btslist->nama }}</option>
                    @endif
                @endforeach
            </select>
            <input type="checkbox" id="checkbox" name="checkbox"> <label for='checkbox'>Select All</label>

        </div>
        <div class="col-md-12 mb-3">
            <a href="#" class="Qnew btn btn-dark mb-3">Tambah Pertanyaan</a>
            <div class="container-fluid" id="questionbar">
                <div class="row bg-light mb-3" id="questionlists">
                    <div class="d-inline p-2 my-3 col-lg-11">
                        <input type="text" class="form-control" placeholder="Input Question" name="question[0]" required>
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
                            <div class="d-inline my-2 col-lg-6">
                                <input type="text" class="form-control @error('optionOne') is-invalid @enderror" placeholder="Add Answer Option" name="optionOne[]" required>
                                @error('optionOne')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-inline my-2 col-lg-6">
                                <input type="text" class="form-control @error('optionTwo') is-invalid @enderror" placeholder="Add Answer Option" name="optionTwo[]" required>
                                @error('optionTwo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row" id="jawaban">
                            <div class="d-inline my-2 col-lg-6">
                                <input type="text" class="form-control @error('optionThree') is-invalid @enderror" placeholder="Add Answer Option" name="optionThree[]" required>
                                @error('optionThree')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-inline my-2 col-lg-6">
                                <input type="text" class="form-control @error('optionFour') is-invalid @enderror" placeholder="Add Answer Option" name="optionFour[]" required>
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
        <div class="button-container justify-content-center d-flex">
            <button type="submit" class=" btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff">Input Data</button>
        </div>
      </form>
</div>

<script>

    $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
        
    $("#checkbox").on('click', function(){
        if($("#checkbox").is(':checked') ){
            $("#bts_select > option").prop("selected","selected");
            $("#bts_select").trigger("change");
        }else{
            console.log('uncheck');
            $("#bts_select > option").prop("selected","");
            $("#bts_select").trigger("change");
        }
    });
    
</script>
<script type="text/javascript">
    var i = 0;
    $(".Qnew").click(function () {
        ++i;
        $("#questionbar").append('<div class="row bg-light mb-3" id="questionlists"><div class="d-inline p-2 my-3 col-lg-11"><input type="text" class="form-control" placeholder="Input Question" name="question['+ i +
            ']" required></div><div class="d-inline p-2 my-3 col-lg-1"><a href="#" class="Qdelete btn btn-danger">Delete</a></div><div class="row" id="answerbar"><div class="row" id="jawaban"><div class="d-inline my-2 col-lg-6"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionOne['+ i +
                ']" required></div><div class="d-inline my-2 col-lg-6"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionTwo['+ i +
                    ']" required></div><div class="d-inline my-2 col-lg-6"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionThree['+ i +
                        ']" required></div><div class="d-inline my-2 col-lg-6"><input type="text" class="form-control" placeholder="Add Answer Option" name="optionFour['+ i +
                            ']" required></div></div></div></div>'
        );
    });
    $(document).on('click', '.Qdelete', function () {
        $(this).parents('.row').remove();
    });
</script>

@endsection
