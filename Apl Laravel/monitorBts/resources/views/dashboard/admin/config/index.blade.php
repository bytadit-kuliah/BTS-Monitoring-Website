{{-- MASIH GATAU / SKIP --}}
@extends('dashboard.layouts.main')

<!-- Main Awal -->
@section('container')
    <h1 class="mt-4 border-3 rounded-3 border-bottom">Edit Configuration</h1>
    <br>
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">System</div>
                <div class="card-body">
                    <div class="col-md-12">
                        <label class="labels" for="metode">Home Page</label>
                        <select class="form-control" id="metode">
                            <option>Home</option>
                            <option>Information - Diskominfo Surakarta</option>
                            <option>Information - Data BTS Tower</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3"><label class="labels">Default Theme</label><input type="text" class="form-control" value="Green Theme"></div>
                    <div class="col-md-12 mt-3"><label class="labels">Timezone</label><input type="text" class="form-control" value="Default Timezone"></div>
                    <div class="col-md-12 mt-3"><label class="labels">Short display date format</label><input type="text" class="form-control" value="April 27, 2022"></div>
                    <div class="col-md-12 mt-3"><label class="labels">Long display date format</label><input type="text" class="form-control" value="April 27, 2022 - 00:00:01AM"></div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">Site</div>
                <div class="card-body">
                    <div class="col-md-12"><label class="labels">Site Title</label><input type="text" class="form-control" value="Diskominfo Surakarta - BTS"></div>
                    <div class="col-md-12 mt-3"><label class="labels">Default Language</label><input type="text" class="form-control" value="id"></div>
                    <div class="col-md-12 mt-3"><label class="labels">Language Supported</label><input type="text" class="form-control" value="en"></div>
                    <div class="col-md-12 mt-3"><label class="labels">Logo</label><input type="file" class="form-control" value="Paijo"></div>
                    <div class="col-md-12 mt-3"><label class="labels">Alamat</label><input type="text" class="form-control" value="Jl.SukarMaju No 16, SKA"></div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Config</button></div>
    </div>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Configuration</h1>
                            <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">System</div>
                            <div class="card-body">
                                <div class="col-md-12">
        <button type="button" class="btn btn-info add-new mb-4" style="background: #52784F; color: #fff"><i class="fa fa-plus"></i>Add New
        </button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id Config</th>
                    <th>Config Name</th>
                    <th>Value</th>
                    <th>Actions</th>
                    <th>Last Edited</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Logo</td>
                    <td><input type="file" name="logo"></td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                    <td>Yesterday at 11:59 PM</td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Alamat</td>
                    <td>Sukoharjo</td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                    <td>Tommorow at 11:59 PM</td>
                </tr>
                <tr>
                    <td>003</td>
                    <td>Company</td>
                    <td>KOMINFO SKA</td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                    <td>Yesterday at 11:59 PM</td>
                </tr>
                <tr>
                    <td>004</td>
                    <td>Faris Izzuddin</td>
                    <td>email4@gmail.com</td>
                    <td>
                        <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                        <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                    </td>
                    <td>Yesterday at 11:59 PM</td>
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
                    '<td><input type="text" class="form-control" name="email" id="email"></td>' +
                    '<td><input type="text" class="form-control" name="password" id="password"></td>' +
                    '<td><input type="text" class="form-control" name="department" id="department"></td>' +
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
