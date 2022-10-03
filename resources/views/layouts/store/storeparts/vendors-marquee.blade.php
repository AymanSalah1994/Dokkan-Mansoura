@isset($vendor)
    <div class="col-md-3">
        <div class="card " style="width: 13rem;">
            @if ($vendor->profile_picture != '')
                <img src="{{ Storage::url($product->product_picture) }}" class="card-img-top" alt="...">
            @else
                <img src="{{ asset('images/thumb.jpg') }}" class="card-img-top" alt="...">
            @endif
        </div>
    </div>
@endisset
