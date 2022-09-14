<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Main Panel
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="{{ asset('dashboard_assets/css/material-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper">
        @include('layouts.dashboard.dashparts.sidebar')
        <div class="main-panel">
            @include('layouts.dashboard.dashparts.nav')
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.dashboard.dashparts.footer')
        </div>
    </div>
    {{-- @include('layouts.dashboard.dashparts.fixed_plugin') --}}
    <!--   Core JS Files   -->
    <script src="{{ asset('dashboard_assets/js/core/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/core/bootstrap-material-design.min.js') }}"></script>
    <script src="{{ asset('dashboard_assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('scripts')
</body>

</html>
