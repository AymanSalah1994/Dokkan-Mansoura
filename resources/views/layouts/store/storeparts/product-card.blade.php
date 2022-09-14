@isset($product)
    <div class="card">
        <img src="{{ Storage::url($product->product_picture) }}" alt="product-image">
        <div class="card-body">
            <a href="{{ route('product.details' ,$product->id)}}">
                <h5>{{ $product->name }}</h5>
            </a>
            <span class="float-start">{{ $product->selling_price }}</span>
            <span class="float-end"><s>{{ $product->original_price }}</s></span>
        </div>
    </div>
@endisset

