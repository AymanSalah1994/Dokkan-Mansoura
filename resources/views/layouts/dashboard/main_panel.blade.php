<!DOCTYPE html>
<html lang="en">
@include('layouts.dashboard.dashparts.head')

<body>
    <div class="wrapper">
        @include('layouts.dashboard.dashparts.sidebar')
        <div class="main-panel">
            <div class="content">
                @yield('content')
            </div>
        </div>
        @include('layouts.dashboard.dashparts.nav')
    </div>
    @include('layouts.dashboard.dashparts.fixed-plugin')
    @include('layouts.dashboard.dashparts.js-dash-files')
    @yield('scripts')
</body>

</html>
