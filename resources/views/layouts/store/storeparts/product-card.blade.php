@isset($product)
    <div class="col-md-3">
        <div class="card " style="width: 18rem;">
            <img src="{{ Storage::url($product->product_picture) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="{{ route('product.details', $product->slug) }}">
                    <h5 class="card-title">{{ $product->name }}</h5>
                </a>
                <span class="float-start">{{ $product->selling_price }}</span>
                <span class="float-end"><s>{{ $product->original_price }}</s></span>
                <br>
                <p class="card-text">{{ Str::limit($product->description , $limit=20,$end="...") }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endisset
