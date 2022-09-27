@extends('layouts.store.main_page')
@section('title', 'Merchant Details')

@section('content')
    <div class="container">
        <h1 class="text-center">Merchant Name</h1>
    </div>
    <hr>
    <div class="container">
        <div class="card shadow merchant_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/m4-lfUHe1vk"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0"> Merchant Name</h2>
                        <br>
                        <hr>
                        <p>Bio : Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        <p>Address : Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                        <p>Telephone : 01210127127</p>
                        <p>
                            <a href="{{ route('merchant.products', $merchant->slug) }}" class="btn btn-primary">
                                All Products
                            </a>
                        </p>
                        <br>
                        <hr>
                        <span>
                            <ul>
                                <li style=""><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            </ul>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection
