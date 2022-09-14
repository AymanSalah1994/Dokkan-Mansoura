@extends('layouts.store.main_page')

@section('slider')
    @include('layouts.store.storeparts.carousel')
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <h2>Featured Products</h2>
            <br>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($featured_products as $product)
                        <div class="item">
                            @include('layouts.store.storeparts.product-card')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <h2>Featured Categories</h2>
            <br>
            <div class="row">
                <div class="owl-carousel owl-theme">
                    @foreach ($featured_categories as $category)
                        <div class="item">
                            @include('layouts.store.storeparts.category-card')
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
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
