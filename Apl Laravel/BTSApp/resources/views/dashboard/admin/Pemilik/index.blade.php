@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Owner BTS</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List Owner BTS:</li>
    </ol>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="table-responsive col-lg-12">
    <button type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i>Add New</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID Owner</th>
                <th>Foto</th>
                <th>Nama Owner</th>
                <th>Alamat Owner</th>
                <th>No. Telepon</th>
                <!-- <th>Pembuat Data</th> -->
                <!-- <th>Waktu Dibuat</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($owners as $owner)
            <tr>
                <td>{{ $owner->id }}</td>
                <td>{{ $owner->foto }}</td>
                <td>{{ $owner->nama }}</td>
                <td>{{ $owner->alamat }}</td>
                <td>{{ $owner->no_telp }}</td>
                <!-- <td>Aditya Bagus</td> -->
                <!-- <td>2020-07-07 10:20:30</td> -->
                <td>
                    <a href="/dashboard/edit-owner/{{ $owner->id }}/edit" class="edit" title="Edit" data-toggle="tooltip">
                        <i class="material-icons">
                            &#xE254;
                        </i>
                    </a>
                    {{-- <a>
                    <form action="/dashboard/edit-owner/{{ $owner->id }}" method="post" class="d-inline delete" title="Delete" data-toggle="tooltip">
                        @method('delete')
                        @csrf
                        <i class="material-icons" onclick="return confirm('Are you sure?')">
                            &#xE872;
                        </i>
                    </form>
                    </a> --}}
                    <form action="/dashboard/edit-owner/{{ $owner->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></button>
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
    {{-- <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function(){
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    // '<td><input type="text" class="form-control" name="kode" id="kode"></td>' +
                    '<td>005</td>' +
                    '<td><input type="text" class="form-control" name="name" id="name"></td>' +
                    '<td><input type="text" class="form-control" name="alamat" id="alamat"></td>' +
                    '<td><input type="text" class="form-control" name="notelp" id="notel"></td>' +
                    // '<td><input type="text" class="form-control" name="pembuat" id="pembuat"></td>' +
                    // '<td><input type="text" class="form-control" name="waktu" id="waktu"></td>' +
                    '<td>' + actions + '</td>' +
                '</tr>';
                $("table").append(row);
                $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
                $('[data-toggle="tooltip"]').tooltip();
            });
            // Add row on add button click
            $(document).on("click", ".add", function(){
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function(){
                    if(!$(this).val()){
                        $(this).addClass("error");
                        empty = true;
                    } else{
                        $(this).removeClass("error");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if(!empty){
                    input.each(function(){
                        $(this).parent("td").html($(this).val());
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            // Edit row on edit button click
            $(document).on("click", ".edit", function(){
                $(this).parents("tr").find("td:not(:last-child)").each(function(){
                    $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            // Delete row on delete button click
            $(document).on("click", ".delete", function(){
                $(this).parents("tr").remove();
                $(".add-new").removeAttr("disabled");
            });
        });
        </script> --}}
@endsection
