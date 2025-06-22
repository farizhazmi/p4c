<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ env('APP_NAME') }}</title>
        <meta name="description" content="Platform Bimbingan Belajar Coding Terpercaya dan Berkualitas">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">


        <!-- ===== CSS ===== -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
        <!-- Font Awesome JS -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="{{ asset('portal/assets/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('portal/assets/css/back.css') }}">
        <link rel="stylesheet" href="{{ asset('portal/assets/css/bootstrap-datepicker.min.css') }}">

    </head>
    <body id="body-pd" class="body-pd" style="background: #f4f4f4;">
        <div class="l-navbar expander" id="navbar">
            <nav class="nav">
                <div>
                    <div class="nav__brand">
                        <ion-icon name="menu-outline" class="nav__toggle" id="nav-toggle"></ion-icon>
                        <a href="" class="nav__logo"></a>
                    </div>
                    <div class="nav__list">
                        <a href="{{ route('portal.exam') }}" class="nav__link {{ $menu == 'my-course' ? 'active' : '' }}">
                            <ion-icon name="book-outline" class="nav__icon"></ion-icon>
                            <span class="nav__name">Ujian</span>
                        </a>
                    </div>
                </div>

                <form style="display: inline" action="" method="post" class="d-inline" onsubmit="return confirm('Anda yakin untuk keluar?')">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" style="width: 100%">Log Out</button>
                </form>
            </nav>
        </div>



        @yield('content')


    <!-- ===== IONICONS ===== -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('portal/assets/js/bootstrap-datepicker.min.js') }}"></script>



    <!-- ===== MAIN JS ===== -->
    <script src="{{ asset('portal/assets/js/main.js') }}"></script>


</body>
</html>
