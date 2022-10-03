<hr>
<div class="container-fluid bg-indigo-600 text-white" style="background-color: rgba(8, 8, 8, 0.818);">
    <footer class="py-5">
        <div class="row">
            <div class="col-2">
                <h5>Social Media</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">Facebook</a></li>
                    <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white">YouTube</a></li>
                </ul>
            </div>
            <div class="col-2">
                <h5>{{ __('Merchants') }}</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('footer.merchant.apply') }}"
                            class="nav-link p-0 text-white">{{ __('How to Apply') }}</a></li>
                </ul>
            </div>

            <div class="col-4 offset-1">
                <h5>{{ __('Thanks for your Trust') }}</h5>
                <p>© @php echo date("Y"); @endphp Dokkan ELMansoura . {{ __('All rights reserved') }}.</p>
            </div>
        </div>

        <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>© @php echo date("Y"); @endphp Dokkan ELMansoura . {{ __('All rights reserved') }}.</p>
        </div>
    </footer>
</div>
