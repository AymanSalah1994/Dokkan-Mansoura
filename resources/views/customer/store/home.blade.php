@extends('layouts.store.main_page')

@section('slider')
    @include('layouts.store.storeparts.carousel')
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <h2 class="">
                {{ __('Featured Products') }}
                <span class="float-end">
                    <a href="{{ route('store.search') }}">
                        {{ __('All Products') }}
                    </a>
                </span>
            </h2>
            <br>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($featured_products as $product)
                        <div class="item row">
                            @include('layouts.store.storeparts.featured-product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <h2 class="">
                {{ __('New Products') }}
                <span class="float-end">
                    <a href="{{ route('store.search') }}">
                        {{ __('All Products') }}
                    </a>
                </span>
            </h2>
            <br>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($new_products as $product)
                        <div class="item row">
                            @include('layouts.store.storeparts.new-product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <h2>
                {{ __('Featured Categories') }}
                <span class="float-end">
                    <a href="{{ route('store.categories') }}">
                        {{ __('All Categories') }}
                    </a>
                </span>
            </h2>
            <br>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($featured_categories as $category)
                        <div class="item">
                            @include('layouts.store.storeparts.featured-category-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <h2 class="text-center">{{ __('Our Partners') }}</h2>
            <br>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($vendors as $vendor)
                        <div class="item">
                            @include('layouts.store.storeparts.vendors-marquee')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.owl-carousel').owlCarousel({
            loop: false,
            margin: 30,
            dots: true,
            nav: false,
            theme: 'green',
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    margin: 10,
                    stagePadding: 20,
                },
                600: {
                    items: 3,
                    margin: 20,
                    stagePadding: 50,
                },
                1000: {
                    items: 4
                }
            }
        });
    </script>
@endsection
