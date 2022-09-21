{{-- categoryProducts --}}
@extends('layouts.store.main_page')
@section('title', 'All Products')
@section('content')
<div class="divider" style="height: 50px">
</div>
<div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('store.categories') }}">Categories</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('category.products', $category->id) }}">{{$category->name }}</a>
            </li>
        </ol>
    </nav>
</div>
    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">{{ $category->name }}</h2>
            <hr>
            <div class="row gy-5">
                @foreach ($categoryProducts as $product)
                    <div class="col-md-3">
                        @include('layouts.store.storeparts.product-card')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
