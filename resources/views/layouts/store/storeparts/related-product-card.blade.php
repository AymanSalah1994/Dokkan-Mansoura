@isset($Rproduct)
    <div class="col-md-3">
        <div class="card " style="width: 18rem;">
            @if ($Rproduct->product_picture != '')
                <img src="{{ Storage::url($Rproduct->product_picture) }}" class="card-img-top" alt="...">
            @else
                <img src="{{ asset('images/thumb.jpg') }}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <a href="{{ route('product.details', $Rproduct->slug) }}">
                    <h5 class="card-title">{{ Str::limit($Rproduct->name, $limit = 19, $end = '..') }}</h5>
                </a>
                <span class="float-start">{{__('EGP')}} {{ $Rproduct->selling_price }} </span>
                <span class="float-end"><s>{{__('EGP')}} {{ $Rproduct->original_price }} </s></span>
                <br>
                <p class="card-text">{{ Str::limit($Rproduct->description, $limit = 19, $end = '..') }}</p>
                <a href="{{ route('product.details', $Rproduct->slug) }}"
                    class="btn btn-info rounded-pill">{{ __('More Details') }}</a>
            </div>
        </div>
    </div>
@endisset


