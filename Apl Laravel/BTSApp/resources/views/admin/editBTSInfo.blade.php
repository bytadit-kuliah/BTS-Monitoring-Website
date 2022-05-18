<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Info BTS - BTS Admin</title>
    <link rel="icon" type="image/x-icon" href="image/BTS logo.png">
    <link rel="stylesheet" href="css/dbAdmin.css">
    <link rel="stylesheet" href="css/editBTSInfo.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <!-- Untuk Tabel -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>

  <body>
    <!-- Header Awal -->
    <header>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-bts-1">
            <a class="navbar-brand ps-3 d-flex bg-bts-3" href="#" style="padding-bottom:18px; border-top-right-radius: 40px; justify-content: center;">
                <img src="image/BTS logo3.png" id="logo" alt="logo" style="margin-left: -25px; margin-top:18px; width: 100px;">
            </a>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">4</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a href="messageList.html" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages
                                <span class="float-right text-muted text-sm">3 mins</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                     aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="editProfileAdmin.html">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Header Akhir -->

    <div id="layoutSidenav">
      <!-- Sidebar Awal -->
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-bts-3" id="sidenavAccordion" style="background-color: #52784F; border-bottom-right-radius: 20px;">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">
                        <div class="d-flex sb-nav-link-icon">
                            <img src="./image/pp.png" style="width:50px; margin-right: 10px;">
                            <div class="d-flex flex-column">
                                <small class="font-weight-normal" style="color:#F4D2EB; font-weight:lighter">Welcome</small>
                                <p >{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="sb-sidenav-menu-heading">General</div>
                    <a class="nav-link" href="/admin">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Master Data</div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Data Akun
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/admin/edit-profile">Edit Profil</a>
                            <a class="nav-link" href="/admin/edit-config">Edit Config</a>
                            <a class="nav-link" href="/admin/edit-surveyor">Edit Surveyor</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                        aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Data BTS
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                        data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="editBTSInfo.html">Edit Info BTS</a>
                            <a class="nav-link" href="editBTSPemilik.html">Edit Pemilik BTS</a>
                            <a class="nav-link" href="editBTSWilayah.html">Edit Wilayah BTS</a>
                            <a class="nav-link" href="editListSurvey.html">Edit Survey</a>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Sidebar Akhir -->

      <div id="layoutSidenav_content">
        <!-- Main Awal -->
        <main>
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
        </main>
        <!-- Main Akhir -->

        <!-- Footer Awal -->
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">
                Copyright &copy; Diskominfo BTS Surakarta 2022
              </div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
        <!-- Footer Awal -->
      </div>
    </div>
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
  </body>
</html>
