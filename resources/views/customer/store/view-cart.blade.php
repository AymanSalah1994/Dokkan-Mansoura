@extends('layouts.store.main_page')
@section('title', 'Cart Items')

@section('content')
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('store.index') }}">Home</a></li>
                <span> / Cart </span>
            </ol>
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
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var box_value = $(this).closest('.product_data').find('.quantity-input').val();
                var parsed_box_value = parseInt(box_value, 10);
                parsed_box_value = isNaN(parsed_box_value) ? 0 : parsed_box_value;
                if (parsed_box_value < 10) {
                    ++parsed_box_value;
                    $(this).closest('.product_data').find('.quantity-input').val(parsed_box_value);
                }
            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var box_value = $(this).closest('.product_data').find('.quantity-input').val();
                var parsed_box_value = parseInt(box_value, 10);
                console.log(parsed_box_value);
                parsed_box_value = isNaN(parsed_box_value) ? 0 : parsed_box_value;
                if (parsed_box_value > 1) {
                    --parsed_box_value;
                    $(this).closest('.product_data').find('.quantity-input').val(parsed_box_value);
                }
            });

            // $('.addToCartBtn').click(function(e) {
            //     e.preventDefault();
            //     var product_id =
            //     var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();
            //     console.log(product_id);
            //     console.log(product_quantity);
            //     $.ajaxSetup({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         }
            //     });
            //     $.ajax({
            //         method: "POST",
            //         url: '{{ route('cart.add') }}',
            //         data: {
            //             'product_id': product_id,
            //             'product_quantity': product_quantity
            //         },
            //         success: function(response) {
            //             console.log(response.status);
            //             swal(response.status)
            //         },
            //         error: function(request, status, error) {
            //             var reqError = JSON.parse(request.responseText);
            //             console.log(reqError.message);
            //             swal(reqError.message)
            //         }
            //     });
            // });

        });
    </script>
@endsection
