<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <!--=====Bootstrap CSS=====-->
            <link href="{{ asset('dashboard_assets/assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
            <!--=====FONTAWESOME ICON=====-->
            <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/icons/css/all.css" />
            <!--=====GOOGLE FONTS=====-->
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
                rel="stylesheet">
            <link
                href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
                rel="stylesheet">
            <!--====Vmap CSS=====-->
            <link href="{{ asset('dashboard_assets/assets') }}/plugins/vmap/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css">
            <!--==========Data Tables CSS==========-->
            <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/css/jquery.dataTables.min.css">
            {{-- Toastr CSS --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
            {{-- trix  --}}
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
            <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
            {{-- select 2 --}}
            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
            {{--=====Bootstrap Icons=====--}}
            {{-- <link rel="stylesheet" href="{{ asset('dashboard_assets/assets/bi/bootstrap-icons.css') }}"> --}}
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
            <!--=====MAIN CSS=====-->
            {{-- <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/css/styles.css" /> --}}

            <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	        <link rel="shortcut icon" href="{{ asset('uploads/images/generalSetting/favicon.png') }}" type="image/x-icon">
            {{-- /{{ generalSettings()->favicon }} --}}
            {{-- color settings main css --}}
            @include('admin.dashboardColorSetting.color_styles')

            <!--==========Responsive CSS==========-->
            <link rel="stylesheet" href="{{ asset('dashboard_assets/assets') }}/css/responsive.css">

            <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

            <title>{{ config('app.name') }} @yield('title') </title>
        </head>

        <style>
            /* .table-overflow-none{
                overflow-x:unset !important;
            } */
        </style>

        @yield('css')

    <body>
