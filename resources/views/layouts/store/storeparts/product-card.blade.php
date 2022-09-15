@isset($product)
    <div class="card" style="width: 18rem;">
        <img src="{{ Storage::url($product->product_picture) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <a href="{{ route('product.details', $product->id) }}">
                <h5 class="card-title">{{ $product->name }}</h5>
            </a>
            <span class="float-start">{{ $product->selling_price }}</span>
            <span class="float-end"><s>{{ $product->original_price }}</s></span>
            <br>
            <p class="card-text">{{ $product->description }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endisset
