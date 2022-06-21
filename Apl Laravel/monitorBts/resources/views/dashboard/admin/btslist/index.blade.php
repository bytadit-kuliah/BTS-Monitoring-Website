@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Data BTS</h1>
    {{-- <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">list BTS:</li>
    </ol> --}}

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="/dashboard/btslists/create" type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Add New</a>

    <div class="container">

            {{-- @foreach($btslists as $btslist)
            <div class="card col-md-3 m-3">
                <h3 class="card-title"><a href="/dashboard/btslists/show" class="text-decoration-none text-dark">{{ $btslist->nama }}</a></h3>
                <div style="max-height: 350px; overflow:hidden;">
                    @if($btsphotos)
                        <img src="{{ asset('storage/' . $btsphoto->firstWhere('btslist_id', $btslist->id)->url) }}" class="img-thumbnail" alt="{{ $btslist->nama }}">
                        @else
                        <img src="https://source.unsplash.com/1200x400?tower" alt="{{ $btslist->nama }}" class="img-fluid">
                    @endif
                </div>
                <div class="card-body">
                    <a href="/dashboard/btslists/{{ $btslist->id }}" class="badge bg-info">
                        <i class="bi bi-eye-fill"></i>
                    </a>
                    @can('admin')
                    <a href="/dashboard/btslists/{{ $btslist->id }}/edit" class="badge bg-warning">
                        <i class="bi bi-pen-fill"></i>
                    </a>
                    <form action="/dashboard/btslists/{{ $btslist->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="bi bi-trash-fill"></i></span></button>
                    </form>
                    @endcan
                    </a>
                </div>
            </div>
            @endforeach --}}
            {{-- <h3>Nyobain Laravel 8 ajax pagination with search</h3> --}}
            <div id="search">
                <form id="searchform" name="searchform">
                    <div class="row">
                    <div class="col-lg-10 col-md-8 col-mb-8">
                        <div class="form-group">
                            <input type="text" placeholder="search bts by name...." name="nama" id="name" value="{{request()->get('nama','')}}" class="form-control" />
                            @csrf
                        </div>
                    </div>
                    {{-- <div class="form-group">
                      <label>Search by body</label>
                      <input type="text" name="body" value="{{request()->get('body','')}}" class="form-control" />
                    </div> --}}
                    <div class="col-lg-2 col-md-2 col-mb-2">
                        <a class='btn btn-success' href='/dashboard/btslists' id='search_btn'>Search</a>
                    </div>
                </div>
                </form>
            </div>
            {{-- <h3 align="center"><span id="total_records"></span>Data Found</h3> --}}
            <div id="pagination_data">
                <div class="container">
                    @include("dashboard.admin.btslist.btsdata",["btslists"=>$btslists])
                </div>
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


    <script>
        $(function() {
      $(document).on("click", "#pagination a,#search_btn", function() {
        // $(document).on("keyup", "#search", function() {

        //get url and make final url for ajax
        var url = $(this).attr("href");
        var append = url.indexOf("?") == -1 ? "?" : "&";
        var finalURL = url + append + $("#searchform").serialize();

        //set to current url
        window.history.pushState({}, null, finalURL);

        $.get(finalURL, function(data) {

          $("#pagination_data").html(data);
        });

        return false;
      })

    });
    </script>
@endsection
