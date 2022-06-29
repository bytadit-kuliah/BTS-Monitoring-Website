@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Data BTS</h1>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-12" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <a href="/dashboard/btslists/create" type="button" class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i> Add New</a>

            <div id="search">
                <form id="searchform" name="searchform">
                    <div class="row justify-content-around mb-3 ">
                        <div class="col-lg-10 col-md-8">
                            <div class="form-group">
                                <input type="text" placeholder="search bts by name...." name="nama" id="name" value="{{request()->get('nama','')}}" class="form-control" />
                                @csrf
                            </div>
                        </div>
                        {{-- <div class="form-group">
                        <label>Search by body</label>
                        <input type="text" name="body" value="{{request()->get('body','')}}" class="form-control" />
                        </div> --}}
                        <div class="col-sm-2 col-sm-1 text-center">
                            <a href='/dashboard/btslists' id='search_btn' class="btn border-0 btn-success add-new mb-4" style="background: #52784F; color: #fff">Search</a>
                        </div>
                    </div>
                </form>
            </div>
            <div id="pagination_data">
                <div class="container">
                    @include("dashboard.admin.btslist.btsdata",["btslists"=>$btslists])
                </div>
            </div>

@endsection
<!-- Main Akhir -->

@section('page-scripts')
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
