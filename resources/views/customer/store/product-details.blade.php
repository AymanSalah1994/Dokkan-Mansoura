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
                <form action="{{ route('review.submit') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $product->slug }}" name="review_product_id">
                    <div class="modal-body">
                        @if ($user_review)
                            <div class="rating-css">
                                <div class="star-icon ">
                                    <input type="radio" value="1" name="product_rating" id="rating1"
                                        {{ $user_review->rating_stars == 1 ? 'checked' : '' }}>
                                    <label for="rating1" class="fa fa-star"></label>
                                    <input type="radio" value="2" name="product_rating" id="rating2"
                                        {{ $user_review->rating_stars == 2 ? 'checked' : '' }}>
                                    <label for="rating2" class="fa fa-star"></label>
                                    <input type="radio" value="3" name="product_rating" id="rating3"
                                        {{ $user_review->rating_stars == 3 ? 'checked' : '' }}>
                                    <label for="rating3" class="fa fa-star"></label>
                                    <input type="radio" value="4" name="product_rating" id="rating4"
                                        {{ $user_review->rating_stars == 4 ? 'checked' : '' }}>
                                    <label for="rating4" class="fa fa-star"></label>
                                    <input type="radio" value="5" name="product_rating" id="rating5"
                                        {{ $user_review->rating_stars == 5 ? 'checked' : '' }}>
                                    <label for="rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                            <textarea name="rating_text" style="min-width: 100%" rows="7">{{ $user_review->rating_text }}</textarea>
                        @else
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
                                    <input type="radio" value="5" name="product_rating" checked id="rating5">
                                    <label for="rating5" class="fa fa-star"></label>
                                </div>
                            </div>
                            <textarea name="rating_text" style="min-width: 100%" rows="7"></textarea>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Home</a></li>
                <li class="breadcrumb-item">
                    <a
                        href="{{ route('category.products', $product->category->slug) }}">{{ $product->category->name }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 ">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ Storage::url($product->product_picture) }}" class="d-block w-100"
                                        alt="iamge">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ Storage::url($product->secondary_picture) }}" class="d-block w-100"
                                        alt="iamge">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}
                        </h2>
                        <label
                            class="float-end badge bg-danger badge-info">{{ $product->trending == '1' ? 'Trending' : '' }}</label>
                        <br>
                        <hr>
                        <label for="" class="me-5">{{ __('Original Price') }} :
                            <s>{{ $product->original_price }}</s>
                        </label>
                        <label for="" class="fw-bold">{{ __('Selling Price') }}
                            :{{ $product->selling_price }}</label>
                        <div class="rating">
                            <span> {{ __('Ratings') }} : {{ $product->reviews()->count() }}</span>
                            <i class="fa fa-star {{ $average_rating >= 1 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 2 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 3 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 4 ? 'checked' : '' }}"></i>
                            <i class="fa fa-star {{ $average_rating >= 5 ? 'checked' : '' }}"></i>
                            <span>{{ $average_rating }} {{ __('of') }} 5 </span>
                        </div>
                        <br>
                        <p>{{ $product->description }}</p>
                        <hr>
                        @if ($product->status == '1')
                            <label for="" class="badge bg-success">{{ __('Available') }}</label>
                        @else
                            <label for="" class="badge bg-danger">{{ __('Out of Stock') }}</label>
                        @endif
                        <div class="row mt-5">
                            <div class="col-md-2">
                                <label for="">{{ __('Quantity') }}</label>
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
                                <button type="button"
                                    class="btn btn-success me-3 float-start addToWishListBtn">{{ __('Add To Wish List') }}
                                    <i class="bi bi-balloon-heart"></i>
                                </button>
                                @if ($product->status == '1')
                                    <button type="button"
                                        class="btn btn-primary me-3 float-start addToCartBtn">{{ __('Add To Cart') }}
                                        <i class="bi bi-cart"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div>
                            <h3>{{ __('Buyer') }}: {{ $product->user->first_name }} </h3>
                        </div>
                        <button type="button" class="btn btn-warning float-end rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            {{ __('Write a Review') }} <i class="fa-solid fa-pen"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/m4-lfUHe1vk"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <div class="col-md-7">
                <h4>-----{{ __('Reviews') }}-------</h4>
                @foreach ($product->reviews as $review)
                    <div class="container">
                        <div class="card shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $review->user->first_name }}</h5>
                                <div class="rating">
                                    <i class="fa fa-star {{ $review->rating_stars >= 1 ? 'checked' : '' }}"></i>
                                    <i class="fa fa-star {{ $review->rating_stars >= 2 ? 'checked' : '' }}"></i>
                                    <i class="fa fa-star {{ $review->rating_stars >= 3 ? 'checked' : '' }}"></i>
                                    <i class="fa fa-star {{ $review->rating_stars >= 4 ? 'checked' : '' }}"></i>
                                    <i class="fa fa-star {{ $review->rating_stars >= 5 ? 'checked' : '' }}"></i>
                                </div>
                                <p class="card-text">{{ $review->rating_text }}</p>
                                <p class="card-text"><small class="text-muted">{{ $review->updated_at }}</small></p>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if ($message = session('status-review-error'))
        <script>
            $.notify('{{ __($message) }}', "error");
        </script>
    @endif
    @if ($message2 = session('status'))
        <script>
            $.notify("{{ __($message2) }}", "success");
        </script>
    @endif
@endsection
