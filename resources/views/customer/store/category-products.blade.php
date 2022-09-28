@extends('layouts.store.main_page')
@section('title', __('All Products'))
@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('store.categories') }}">{{ __('Categories') }}</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.products', $category->slug) }}">{{ $category->name }}</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">{{ $category->name }}</h2>
            <hr>
            <div class="row">
                @foreach ($categoryProducts as $product)
                        @include('layouts.store.storeparts.product-card')
                @endforeach
            </div>
        </div>
    </div>
@endsection
