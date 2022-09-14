@extends('layouts.store.main_page')
@section('title', 'Cart Items')

@section('slider')
    @include('customer.store.toast')
@endsection
@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Home</a></li>
                <span> / Cart </span>
            </ol>
            <span>TOTAL :{{ $total }} </span>
            <button type="button" class="btn btn-primary">Clear Cart</button>
            <button type="button" class="btn btn-primary">Save Updates</button>
            <button type="button" class="btn btn-primary">Checkout >></button>

        </nav>
    </div>

    <div class="container">
        @foreach ($currentCartItems as $cartItem)
            <div class="card shadow product_data mb-3">
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($cartItem->product->product_picture) }}" class="image-responsive"
                                width="25%" alt="">
                        </div>
                        <div class="col-md-4">
                            <h3>{{ $cartItem->product->name }}</h3>
                        </div>
                        <div class="col-md-2">
                            <label for="">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <span class="input-group-text decrement-btn">-</span>
                                <input type="text" name="" value="{{ $cartItem->quantity }}"
                                    class="form-control quantity-input">
                                <span class="input-group-text increment-btn">+</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $cartItem->id }}" class="cartItemID">
                            <button type="button" class="btn btn-danger deleteFromCartBtn">
                                Delete <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <br>
@endsection

@section('scripts')
    <script>
        console.log('xxx');
        $(document).ready(function() {
            $('.deleteFromCartBtn').click(function(e) {
                e.preventDefault();
                var cartItemID = $(this).closest('.product_data').find('.cartItemID').val();
                console.log(cartItemID);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: '{{ route('cart.item.delete') }}',
                    data: {
                        'cartItemID': cartItemID,
                    },
                    success: function(response) {
                        swal(response.status);
                        window.location.reload();
                        // $('.toast').toast('show');
                    },
                    error: function(request, status, error) {
                        var reqError = JSON.parse(request.responseText);
                        console.log(reqError.message);
                        swal(reqError.message)
                    }
                });
            });
        });
    </script>
@endsection
