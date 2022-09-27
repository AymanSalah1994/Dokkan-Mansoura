@extends('layouts.store.main_page')
@section('title', 'Cart Items')

@section('slider')
    @include('customer.store.toast')
@endsection
@if ($currentCartItems->count() == 0)
    @section('content')
    @include('layouts.dividers.divider-small')
        <div class="container">
            <div class="card shadow product_data mb-3">
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-6">
                            <img src="{{ asset('images/some_asset/cart.png') }}" alt="" width="30%">
                        </div>
                        <div class="col-md-3">
                            {{__('Your Cart is Empty !')}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@else
    @section('content')
        <br>
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
                                    <span class="input-group-text updateCartItem decrement-btn">-</span>
                                    <input type="text" name="" value="{{ $cartItem->quantity }}"
                                        class="form-control quantity-input">
                                    <span class="input-group-text updateCartItem increment-btn">+</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $cartItem->id }}" class="cartItemID">
                                <button type="button" class="btn btn-danger deleteFromCartBtn">
                                    {{__('Delete')}} <i class="bi bi-trash3"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-md-7"></div>
                <div class="col-md-5">
                    <div class="card">
                        <table class="table table-hover">
                            <thead>
                                <th>{{__('Total')}} : </th>
                                <th>{{ $total }}</th>
                            </thead>
                            <tr>
                                <td>
                                    <form action="{{ route('cart.clear') }}" method="post" class="form-inline float-start">
                                        @csrf
                                        <button href="" class="btn btn-danger">{{__('Clear Cart')}}</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('cart.checkout') }}" class="btn btn-success rounded-pill">{{__('CheckOut')}}</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.deleteFromCartBtn').click(function(e) {
                e.preventDefault();
                var cartItemID = $(this).closest('.product_data').find('.cartItemID').val();
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
                    },
                    error: function(request, status, error) {
                        var reqError = JSON.parse(request.responseText);
                        swal(reqError.message)
                    }
                });
            });

            $('.updateCartItem').click(function(e) {
                e.preventDefault();
                var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();
                var cartItemID = $(this).closest('.product_data').find('.cartItemID').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: '{{ route('cart.item.update') }}',
                    data: {
                        'product_quantity': product_quantity,
                        'cartItemID': cartItemID
                    },
                    success: function(response) {
                        // swal(response.status);
                        // window.location.reload();
                        $('.toast').toast('show');
                    },
                    error: function(request, status, error) {
                        var reqError = JSON.parse(request.responseText);
                        console.log(reqError.message);
                        // swal(reqError.message)
                        // Custom Message if you Want
                        swal("SomeThing Went Wrong")
                    }
                });
            });



        });
    </script>

    @if ($message = session('status'))
        <script>
            swal('{{ $message }}');
        </script>
    @endif
@endsection
