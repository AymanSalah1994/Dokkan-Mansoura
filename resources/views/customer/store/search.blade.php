@extends('layouts.store.main_page')
@section('title', 'Search')
@section('slider')

@endsection

@section('content')
    @include('layouts.dividers.divider-medium')
    <section class="search-sec">
        <div class="container">
            <form action="#" method="post" novalidate="novalidate">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                <input type="text" class="form-control search-slt" placeholder="Enter Drop City">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="search-slt" id="exampleFormControlSelect1">
                                    <option>Select Drop City</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                <select class="search-slt" id="exampleFormControlSelect1">
                                    <option>Select Vehicle</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                    <option>Example one</option>
                                </select>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                                <button type="button" class="btn btn-primary wrn-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @include('layouts.dividers.divider-small')
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-9">
                {{-- max-width: 540px;" --}}
                @foreach ($allProducts as $product)
                    <div class="card mb-3" style="">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ Storage::url($product->product_picture) }}" class="card-img card-img-top"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="{{ route('product.details', $product->id) }}">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                    </a>
                                    <p class="card-text">{{ Str::limit($product->description , $limit=50,$end="...") }}</p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            Price : {{ $product->selling_price }}
                                        </small></p>
                                        <p class="card-text">
                                            <small class="text-muted">
                                                Buyer : {{ $product->user_id }}
                                            </small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script></script>
@endsection
