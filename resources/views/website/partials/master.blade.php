<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
        <link rel="shortcut icon" href="{{ asset('imgs/LOGO_title.ico') }}" />
        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/earlyaccess/droidarabickufi.css" type="text/css"/>

        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-rtl.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.css') }}">
        <link rel="stylesheet" href="{{ asset('css/fixedHeader.dataTables.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/tether.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.fixedColumns.js') }}"></script>

        <!--for IE compatibility-->

        <script src="{{ asset('js/html5shiv.min.js') }}"></script>
        <script src="{{ asset('js/respond.min.js') }}"></script>

        <title>@yield('title' , 'مرحباً بكم في شركة الشرق للخدمات البترولية')</title>

    </head>

    <body class="data_page">

        @yield('content')

    <script>

        $(document).ready(function () {

            $(document).on('click' , '.delete-btn' , function (e) {

                if (!confirm('هل تريد الحذف ؟!')) {
                    e.preventDefault();
                }

            });

        });

    </script>

    </body>

</html>