@isset($category)
    <div class="card">
        {{-- <a href="{{ route('category.products', $category->id) }}" style=""> --}}
            <img src="{{ Storage::url($category->category_picture) }}" alt="category-image">
        {{-- </a> --}}
        <div class="card-body">
            <a href="{{ route('category.products', $category->id) }}">
                <h5>{{ $category->name }}</h5>
            </a>
            <span class="float-start">{{ $category->description }}</span>
        </div>
    </div>
@endisset
