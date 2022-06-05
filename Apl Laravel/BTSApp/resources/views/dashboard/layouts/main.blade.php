<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BTSApp | Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/script/trix.js"></script>
    <link rel="icon" type="image/x-icon" href="/image/BTS logo.png">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> <!-- table icons (edit-surveyor, edit-bts, ...) -->

    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
        a, a > *{
            cursor: pointer;
        }
    </style>
</head>
  <body>
      @include('dashboard.layouts.header')

      {{-- <div class="container-fluid">
          <div class="row"> --}}
              <div id="layoutSidenav">
                  @include('dashboard.layouts.sidebar')
                  <div id="layoutSidenav_content">
                      <main>
                        <div class="container-fluid px-4">
                            @yield('container')
                        </div>
                      </main>
                      @include('dashboard.layouts.footer')
                  </div>
              </div>
              

            {{-- </div>
        </div> --}}

    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    <script src="/script/dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="/script/chartAdmin.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    @yield('page-scripts')
</html>
