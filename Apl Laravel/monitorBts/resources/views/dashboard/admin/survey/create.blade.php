@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Buat Survey Baru</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Edit Survey</li>
            <li class="breadcrumb-item active">new survey</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">silakan isi tiap pertanyaan untuk survey baru:</li>
        </ol>
        <button type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i>Add New</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pertanyaan</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>
                        <input type="text" value="Contoh pertanyaan pertama ?"/>
                    </td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <!-- <tr>
                <td>2</td>
                <td><input/></td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><input/></td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><input/></td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                </tr>    -->
            </tbody>
        </table>
        <div class="row">
        <button type="button" class="btn btn-info w-25  mb-4 m-lg-auto" style="background: #52784F; color: #fff">Tambah Survey</button>
        </div>

    </div>


    <!-- <div class="container-fluid px-4">
        <h1 class="mt-4">Buat Survey Baru</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">Edit Survey</li>
            <li class="breadcrumb-item active">new survey</li>
        </ol>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">silakan isi tiap pertanyaan untuk survey baru:</li>
        </ol>
        <div class="col">
            <div id="survey-answers">

                <form class="mx-0 mx-sm-auto card">
                    <div class="text-center card-header">
                        <strong>Pertanyaan 1</strong>
                    </div>

                    <div class="text-center mb-3 card-body">
                        <input class="form-check-input w-100 h-auto">
                    </div>
                </form>


            </div>
        </div>
    </div> -->
<!-- Main Akhir -->
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
                    '<td>2</td>' +
                    '<td><input type="text" class="form-control" name="question" id="question"></td>' +
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
