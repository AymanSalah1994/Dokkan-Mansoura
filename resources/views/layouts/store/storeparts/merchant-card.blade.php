@isset($merchant)
    {{-- {{ Storage::url($merchant->merchant_picture) }} --}}
    <div class="col-md-3 gy-3 d-flex justify-content-center">
        <div class="card merchant">
            <div class="box">
                <div class="img">
                    @if ($merchant->profile_picture)
                        <img src="{{ Storage::url($merchant->profile_picture) }}">
                    @else
                        <img src="{{ asset('images/150x150.png') }}">
                    @endif
                </div>
                <h2><a href="{{ route('merchant.details', $merchant->slug) }}">{{ $merchant->first_name }}
                    </a><br><span>--</span></h2>
                <p>{{ $merchant->first_name }}</p>
                @if ($merchant->fb_link)
                    <span>
                        <ul>
                            <li><a href="{{ $merchant->fb_link }}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        </ul>
                    </span>
                @endif
            </div>
        </div>
    </div>
@endisset
