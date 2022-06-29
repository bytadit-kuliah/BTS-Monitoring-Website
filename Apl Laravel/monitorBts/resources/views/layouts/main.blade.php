<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="image/BTS logo.png">
    <link rel="stylesheet" href="css/btslist.css">
    <link rel="stylesheet" href="css/btsmonitor.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/dbAdmin.css">
    <link rel="stylesheet" href="css/editBTSInfo.css">
    <link rel="stylesheet" href="css/editProfile.css">
    <link rel="stylesheet" href="css/editSurveyorList.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/inputSurvey.css">
    <link rel="stylesheet" href="css/listBTSInfo.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/messageList.css">
    <link rel="stylesheet" href="css/newSurvey.css">
    <link rel="stylesheet" href="css/surveyList.css">
    <link rel="stylesheet" href="css/thanks.css">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  </head>
  <body style='background-color:#FDF7F2'>
    <header>
        <div id="brand"><a href="/">
                <img src="image/BTS logo.png" alt="logo"></a>
        </div>
        <nav>
            <ul>
                @if (Auth::check())
                    <li id="login"><a href="/dashboard">{{Auth::user()->firstName}}</a></li>
                @else
                    <li id="login"><a href="/login">Log In</a></li>
                @endif
            </ul>
        </nav>
    </header>
    <!--Header Akhir-->

    <div class="container" style='min-height:74vh'>
        @yield('container')
    </div>

    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function dropdownFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function (e) {
            if (!e.target.matches('.drop_btn')) {
                var myDropdown = document.getElementById("myDropdown");
                if (myDropdown.classList.contains('show')) {
                    myDropdown.classList.remove('show');
                }
            }
        }
    </script>

  </body>
</html>
