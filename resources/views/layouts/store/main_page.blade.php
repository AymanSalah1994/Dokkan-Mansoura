<!DOCTYPE html>
<html lang="en">

@include('layouts.store.storeparts.head')

<body class="bg-light" style="margin: 0%">
    @include('layouts.store.storeparts.nav')
    @yield('slider')
    <div class="content">
        @yield('content')
    </div>
    @include('layouts.store.storeparts.footer')
    @include('layouts.store.storeparts.store-js')
    @yield('scripts')
</body>

</html>
