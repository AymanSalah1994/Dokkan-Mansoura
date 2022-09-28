@extends('layouts.store.main_page')
@section('title', __('All Products'))
@section('content')
    <div class="py-5">
        <div class="container">
            <br>
            <h2 class="text-center">{{ $merchant->first_name }}</h2>
            <hr>
            <div class="row">
                @foreach ($products as $product)
                        @include('layouts.store.storeparts.product-card')
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        {{$products->links()}}
    </div>
@endsection
