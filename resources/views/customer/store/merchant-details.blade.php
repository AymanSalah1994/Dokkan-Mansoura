@extends('layouts.store.main_page')
@section('title', 'Merchant Details')

@section('content')
    <div class="divider" style="height: 75px">
    </div>

    <div class="container">
        <h1 class="text-center">Merchant Name</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/m4-lfUHe1vk"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-md-4">
                        <h2 class="mb-0"> Merchant Name</h2>
                        <br>
                        <hr>
                        <p>Bio : Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        <p>Address : Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        <p>Telephone : 01210127127</p>
                        <p><a href="{{ route('merchant.products', $merchant->slug) }}">All Products</a></p>
                        <br>
                        <hr>
                        <span> <i class="fa fa-facebook"></i></span>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset('images/some_asset/3.jpg') }}" alt="" class="rounded-circle"
                            style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
