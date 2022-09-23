@extends('layouts.store.main_page')
@section('title', $product->name)



@section('content')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('review.submit') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="rating-css">
                            <div class="star-icon ">
                                <input type="radio" value="1" name="product_rating" id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            </div>
                        </div>
                        <textarea name="" id="" style="min-width: 100%" rows="7"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="divider" style="height: 50px">
    </div>

    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Home</a></li>
                <li class="breadcrumb-item">
                    <a href="{{ route('category.products', $product->category->id) }}">{{ $product->category->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ Storage::url($product->product_picture) }}" class="w-100 " alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                        </h2>
                        <label
                            class="float-end badge bg-danger badge-info">{{ $product->trending == '1' ? 'Trending' : '' }}</label>
                        <br>
                        <hr>
                        <label for="" class="me-5">Original Price : <s>{{ $product->original_price }}</s></label>
                        <label for="" class="fw-bold">Selling price :{{ $product->selling_price }}</label>
                        <div class="rating">
                            <span>5 Ratings :</span>
                            <i class="fa fa-star checked"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <br>
                        <p>
                            {{ $product->description }}
                        </p>
                        <hr>
                        {{-- $procut->quantity > 0 --}}
                        @if ($product->status == '1')
                            <label for="" class="badge bg-success">Available</label>
                        @else
                            <label for="" class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-5">
                            <div class="col-md-2">
                                <label for="">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <span class="input-group-text decrement-btn">-</span>
                                    <input type="text" name="" value="1"
                                        class="form-control quantity-input">
                                    <span class="input-group-text increment-btn">+</span>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                <input type="hidden" value="{{ $product->id }}" class="product_id">
                                <button type="button" class="btn btn-success me-3 float-start addToWishListBtn">ِAdd To
                                    wishlist
                                    <i class="bi bi-balloon-heart"></i>
                                </button>
                                @if ($product->status == '1')
                                    <button type="button" class="btn btn-primary me-3 float-start addToCartBtn">Add to
                                        Cart
                                        <i class="bi bi-cart"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h3>Buyer: </h3>
                        </div>
                        <button type="button" class="btn btn-warning float-end rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Write a Review <i class="fa-solid fa-pen"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

@endsection

@section('scripts')
    @if ($message = session('status-error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ $message }}',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        </script>
    @endif
@endsection
