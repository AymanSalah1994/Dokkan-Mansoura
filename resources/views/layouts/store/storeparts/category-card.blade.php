@isset($category)
    <div class="card" style="width: 18rem;">
        <img src="{{ Storage::url($category->category_picture) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <a href="{{ route('category.products', $category->id) }}">
                <h5 class="card-title">{{ $category->name }}</h5>
            </a>
            <p class="card-text">{{ $category->description }}</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
@endisset
