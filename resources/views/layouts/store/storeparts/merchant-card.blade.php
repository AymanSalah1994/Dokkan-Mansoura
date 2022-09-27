@isset($merchant)
    {{-- {{ Storage::url($merchant->merchant_picture) }} --}}
    <div class="col-md-3">
        <div class="card merchant">
            <div class="box">
                <div class="img">
                    <img src="{{ asset('images/some_asset/3.jpg') }}">
                </div>
                <h2><a href="{{ route('merchant.details', $merchant->slug) }}">{{ $merchant->first_name }}
                    </a><br><span>Laptops</span></h2>
                <p>{{ $merchant->first_name }}</p>
                <span>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    </ul>
                </span>
            </div>
        </div>
    </div>
@endisset
