<script src="{{ asset('store_assets/js/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('store_assets/js/owl.carousel.min.js') }}"></script>
{{-- TODO  --}}
{{-- TODO  --}}
<script src="{{ asset('dashboard_assets/js/sweetalert2.js') }}"></script>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
{{-- TODO  --}}
{{-- TODO  --}}
{{-- ToDO : If you swap those Two Lines of Sweet Alert you Get Error  --}}
{{-- And the Project will Not work Properly ! --}}
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
</script>

{{-- instead of using src and js Files We will use some Blade methods and stuff --}}
@include('layouts.store.wish-cart-js')

{{-- <script src="{{ asset('store_assets/js/navBarCounter.js') }}"></script> --}}
<script src="{{ asset('store_assets/js/inc-dec.js') }}"></script>
