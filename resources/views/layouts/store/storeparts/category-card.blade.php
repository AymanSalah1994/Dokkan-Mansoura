@isset($category)
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ Storage::url($category->category_picture) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <a href="{{ route('category.products', $category->slug) }}">
                    <h5 class="card-title">{{ $category->name }}</h5>
                </a>
                <p class="card-text">{{ Str::limit($category->description, $limit = 20, $end = '...') }}</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endisset
