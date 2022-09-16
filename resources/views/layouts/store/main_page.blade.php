<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @yield('title', 'Store')
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="{{ asset('store_assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('store_assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('store_assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('store_assets/css/custom.css') }}" rel="stylesheet" />
</head>

<body>
    @include('layouts.store.storeparts.nav')
    @yield('slider')
    <div class="content">
        @yield('content')
    </div>
    {{-- @include('layouts.dashboard.dashparts.footer') --}}
    <script src="{{ asset('store_assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('store_assets/js/owl.carousel.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="{{ asset('store_assets/js/inc-dec.js') }}"></script>
    <script src="{{ asset('store_assets/js/navBarCounter.js') }}"></script>
    @yield('scripts')
</body>

</html>
