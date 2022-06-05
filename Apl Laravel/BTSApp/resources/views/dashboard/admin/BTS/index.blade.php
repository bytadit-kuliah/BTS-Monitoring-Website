@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Info BTS</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">list BTS:</li>
        </ol>
        <button type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i>Add New</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID BTS</th>
                    <th>ID Jenis BTS</th>
                    <th>Nama BTS</th>
                    <th>ID Desa</th>
                    <th>Lok. BTS</th>
                    <th>Pem. BTS</th>
                    <th>Pj. Tanah</th>
                    <th>Lb. Tanah</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Tg. Tower</th>
                    <th>Ada Genset</th>
                    <th>Ada Tembok</th>
                    <th>Wkt. Dibuat</th>
                    <th>ID Pembuat</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0001</td>
                    <td>1 kaki</td>
                    <td>ABC-0001</td>
                    <td>23</td>
                    <td>Jl.jl ke mana ya abc</td>
                    <td>Telkomsel</td>
                    <td>90</td>
                    <td>34</td>
                    <td>0.941982</td>
                    <td>106.19061</td>
                    <td>43.5</td>
                    <td>0</td>
                    <td>0</td>
                    <td>2004-07-12 21:23:44</td>
                    <td>001</td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>0002</td>
                    <td>3 kaki</td>
                    <td>ABC-0002</td>
                    <td>25</td>
                    <td>Jl.jl sersassa abc</td>
                    <td>Telkomsel</td>
                    <td>89</td>
                    <td>23</td>
                    <td>0.940911</td>
                    <td>106.18443</td>
                    <td>43.5</td>
                    <td>1</td>
                    <td>1</td>
                    <td>2005-05-10 11:23:44</td>
                    <td>001</td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>0003</td>
                    <td>3 kaki</td>
                    <td>ABC-0003</td>
                    <td>24</td>
                    <td>Jl.jl ke meuda terus</td>
                    <td>Telkomsel</td>
                    <td>103</td>
                    <td>33</td>
                    <td>0.910914</td>
                    <td>110.18063</td>
                    <td>43.5</td>
                    <td>1</td>
                    <td>1</td>
                    <td>2008-10-21 11:23:44</td>
                    <td>001</td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>9998</td>
                    <td>4 kaki</td>
                    <td>ABC-9999</td>
                    <td>13</td>
                    <td>Jl.jalan kidang kelapa</td>
                    <td>Tri</td>
                    <td>89</td>
                    <td>34</td>
                    <td>0.321231</td>
                    <td>111.18022</td>
                    <td>43.5</td>
                    <td>0</td>
                    <td>1</td>
                    <td>2008-11-11 13:23:44</td>
                    <td>001</td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
<!-- Main Akhir -->

@section('page-scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            // Append table with add row form on add new button click
            $(".add-new").click(function(){
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = '<tr>' +
                    '<td> 9999 </td>' +
                    '<td><input type="text" class="form-control" name="id_jenis_bts" id="id_jenis_bts"></td>' +
                    '<td><input type="text" class="form-control" name="nama_bts" id="nama_bts"></td>' +
                    '<td><input type="text" class="form-control" name="id_desa" id="id_desa"></td>' +
                    '<td><input type="text" class="form-control" name="lokasi_bts" id="lokasi_bts"></td>' +
                    '<td><input type="text" class="form-control" name="id_pemilik_bts" id="id_pemilik_bts"></td>' +
                    '<td><input type="text" class="form-control" name="panjang_tanah" id="panjang_tanah"></td>' +
                    '<td><input type="text" class="form-control" name="lebar_tanah" id="lebar_tanah"></td>' +
                    '<td><input type="text" class="form-control" name="latitude" id="latitude"></td>' +
                    '<td><input type="text" class="form-control" name="longitude" id="longitude"></td>' +
                    '<td><input type="text" class="form-control" name="tinggi_tower" id="tinggi_tower"></td>' +
                    '<td><input type="text" class="form-control" name="ada_genset" id="ada_genset"></td>' +
                    '<td><input type="text" class="form-control" name="ada_tembok_batas" id="namada_tembok_batase"></td>' +
                    '<td></td>' +
                    '<td>001</td>' +
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
    </script>
@endsection