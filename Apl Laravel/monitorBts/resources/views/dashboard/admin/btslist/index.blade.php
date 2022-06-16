@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Info BTS</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">list BTS:</li>
    </ol> --}}

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="/dashboard/edit-bts/create" type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Add New</a>

    <div class="container">
        <div class="row">
            @foreach($bts_list as $bts)
            <div class="card col-md-3 m-3">
                <h3 class="card-title"><a href="/dashboard/edit-bts/show" class="text-decoration-none text-dark">{{ $bts->namaBTS }}</a></h3>
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="https://source.unsplash.com/1200x400?tower" alt="gbr" class="img-fluid">
                </div>
                <div class="card-body">
                    <a href="/dashboard/edit-bts/{{ $bts->id }}" class="badge bg-info">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    <a href="/dashboard/edit-bts/{{ $bts->id }}/edit" class="badge bg-warning">
                        <i class="bi bi-pen-fill"></i>
                    </a>
                    <form action="/dashboard/edit-bts/{{ $bts->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></span></button>
                    </form>
                        </span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
<!-- Main Akhir -->

@section('page-scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            // var actions = $("table td:last-child").html();
            // // Append table with add row form on add new button click
            // $(".add-new").click(function(){
            //     $(this).attr("disabled", "disabled");
            //     var index = $("table tbody tr:last-child").index();
            //     var row = '<tr>' +
            //         '<td> 9999 </td>' +
            //         '<td><input type="text" class="form-control" name="id_jenis_bts" id="id_jenis_bts"></td>' +
            //         '<td><input type="text" class="form-control" name="nama_bts" id="nama_bts"></td>' +
            //         '<td><input type="text" class="form-control" name="id_desa" id="id_desa"></td>' +
            //         '<td><input type="text" class="form-control" name="lokasi_bts" id="lokasi_bts"></td>' +
            //         '<td><input type="text" class="form-control" name="id_pemilik_bts" id="id_pemilik_bts"></td>' +
            //         '<td><input type="text" class="form-control" name="panjang_tanah" id="panjang_tanah"></td>' +
            //         '<td><input type="text" class="form-control" name="lebar_tanah" id="lebar_tanah"></td>' +
            //         '<td><input type="text" class="form-control" name="latitude" id="latitude"></td>' +
            //         '<td><input type="text" class="form-control" name="longitude" id="longitude"></td>' +
            //         '<td><input type="text" class="form-control" name="tinggi_tower" id="tinggi_tower"></td>' +
            //         '<td><input type="text" class="form-control" name="ada_genset" id="ada_genset"></td>' +
            //         '<td><input type="text" class="form-control" name="ada_tembok_batas" id="namada_tembok_batase"></td>' +
            //         '<td></td>' +
            //         '<td>001</td>' +
            //         '<td>' + actions + '</td>' +
            //     '</tr>';
            //     $("table").append(row);
            //     $("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
            //     $('[data-toggle="tooltip"]').tooltip();
            // });
            // // Add row on add button click
            // $(document).on("click", ".add", function(){
            //     var empty = false;
            //     var input = $(this).parents("tr").find('input[type="text"]');
            //     input.each(function(){
            //         if(!$(this).val()){
            //             $(this).addClass("error");
            //             empty = true;
            //         } else{
            //             $(this).removeClass("error");
            //         }
            //     });
            //     $(this).parents("tr").find(".error").first().focus();
            //     if(!empty){
            //         input.each(function(){
            //             $(this).parent("td").html($(this).val());
            //         });
            //         $(this).parents("tr").find(".add, .edit").toggle();
            //         $(".add-new").removeAttr("disabled");
            //     }
            // });
            // // Edit row on edit button click
            // $(document).on("click", ".edit", function(){
            //     $(this).parents("tr").find("td:not(:last-child)").each(function(){
            //         $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
            //     });
            //     $(this).parents("tr").find(".add, .edit").toggle();
            //     $(".add-new").attr("disabled", "disabled");
            // });
            // // Delete row on delete button click
            // $(document).on("click", ".delete", function(){
            //     $(this).parents("tr").remove();
            //     $(".add-new").removeAttr("disabled");
            // });
        });
    </script>
@endsection
