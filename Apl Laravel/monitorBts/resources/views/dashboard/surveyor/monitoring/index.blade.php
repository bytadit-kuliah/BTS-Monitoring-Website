@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Data Monitoring</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">List Data Monitoring:</li>
    </ol>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="table-responsive col-lg-12">
    <a href="/dashboard/monitorings/create" class="btn btn-success mb-4">Add New</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Monitoring</th>
                <th >Nama BTS</th>
                <th>Waktu Monitoring</th>
                <th style="width:40%">Catatan</th>
                <!-- <th>Pembuat Data</th> -->
                <!-- <th>Waktu Dibuat</th> -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($monitorings as $monitoring)
            <tr>
                <td>{{ $loop->iteration }}</td>
                {{-- <td>
                    @if($monitoring->foto)
                    <div style="max-height: 100px; max-width:100px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $monitoring->foto) }}" alt="{{ $monitoring->nama }}" class="img-fluid mt-3">
                    </div>
                    @else
                    <img src="https://source.unsplash.com/100x100?tower" alt="{{ $monitoring->nama }}" class="img-fluid mt-3">
                    @endif
                </td> --}}
                <td>{{ $monitoring->nama }}</td>
                <td>{{ $monitoring->btslist->nama }}</td>
                <td>{{ $monitoring->waktu_monitoring }}</td>
                <td> {!! $monitoring->catatan !!}</td>
                {{-- <td> {{  $monitoring->catatan  }}</td> --}}
                {{-- <td>
                    @if($monitoring->btslist)
                        <ul>
                            @foreach($monitoring->btslist as $btslistmonitoring)
                                <li>{{ $btslistmonitoring->nama }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>None</p>
                    @endif
                </td> --}}
                <td>
                    <a href="/dashboard/monitorings/{{ $monitoring->id }}/edit" class="edit badge bg-warning" title="Edit" data-toggle="tooltip">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    {{-- <a href="/dashboard/monitorings/{{ $monitoring->id }}" class="show badge bg-info" title="Show" data-toggle="tooltip">
                        <i class="bi bi-eye-fill"></i>
                    </a> --}}
                    <form action="/dashboard/monitorings/{{ $monitoring->id }}" method="post" class="badge bg-danger border-0">
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
