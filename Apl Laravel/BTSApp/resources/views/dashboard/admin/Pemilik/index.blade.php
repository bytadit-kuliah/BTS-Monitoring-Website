@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Pemilik BTS</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">list pemilik BTS:</li>
        </ol>
        <button type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i>Add New</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Vendor</th>
                    <th>Nama Vendor</th>
                    <th>Alamat Vendor</th>
                    <th>No. Telepon</th>
                    <!-- <th>Pembuat Data</th> -->
                    <!-- <th>Waktu Dibuat</th> -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Telkomsel</td>
                    <td>Jl. doang jadian kagak</td>
                    <td>0888-1234-5678</td>
                    <!-- <td>Aditya Bagus</td> -->
                    <!-- <td>2020-07-07 10:20:30</td> -->
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Tri</td>
                    <td>Jl. in aja dulu</td>
                    <td>0888-9999-1010</td>
                    <!-- <td>Alin Nur</td> -->
                    <!-- <td>2020-08-16 11:22:33</td> -->
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>XL Axiata</td>
                    <td>Jl. buntu</td>
                    <td>0888-7777-6666</td>
                    <!-- <td>Christopher Aaron</td> -->
                    <!-- <td>2020-11-22 15:30:45</td> -->
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Indosat</td>
                    <td>Jl. ninjaku</td>
                    <td>0888-0888-0888</td>
                    <!-- <td>Faris Izzuddin</td> -->
                    <!-- <td>2020-12-28 17:00:10</td> -->
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
    <script>
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
        </script>
@endsection