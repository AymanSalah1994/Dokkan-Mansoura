@isset($product)
    <div class="col-md-3 gy-3 d-flex justify-content-center">
        <div class="card " style="width: 18rem;">
            @if ($product->product_picture != "")
            <img src="{{ Storage::url($product->product_picture) }}" class="card-img-top" alt="...">
            @else
            <img src="{{ asset('images/thumb.jpg') }}" class="card-img-top" alt="...">
            @endif
            <div class="card-body">
                <a href="{{ route('product.details', $product->slug) }}">
                    <h5 class="card-title">{{ Str::limit($product->name , $limit=19,$end="..") }}</h5>
                </a>
                <span class="float-start">{{ $product->selling_price }}</span>
                <span class="float-end"><s>{{ $product->original_price }}</s></span>
                <br>
                <p class="card-text">{{ Str::limit($product->description , $limit=19,$end="..") }}</p>
                <a href="{{ route('product.details', $product->slug) }}" class="btn btn-primary">{{__('More Details')}}</a>
            </div>
        </div>
    </div>
@endisset
