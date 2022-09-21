@extends('layouts.store.main_page')
@section('title', 'Wish List Items')

@section('slider')

@endsection
@section('content')
<div class="divider" style="height: 75px">
</div>
    <div class="py-3 px-5 mb-2 shadow-sm bg-warning border-top">
    </div>

    <div class="container">
        @foreach ($wishListItems as $wish_list_item)
            <div class="card shadow product_data mb-3">
                <div class="card-body">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-4">
                            <img src="{{ Storage::url($wish_list_item->product->product_picture) }}" class="image-responsive"
                                width="25%" alt="">
                        </div>
                        <div class="col-md-4">
                            <h3>{{ $wish_list_item->product->name }}</h3>
                        </div>
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">
                            <input type="hidden" value="{{ $wish_list_item->id }}" class="wishListItemID">
                            <button type="button" class="btn btn-danger deleteFromWishListBtn">
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
        // updateCartItem
        console.log('xxx');
        $(document).ready(function() {
            $('.deleteFromWishListBtn').click(function(e) {
                e.preventDefault();
                var wishListItemID = $(this).closest('.product_data').find('.wishListItemID').val();
                console.log(wishListItemID);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: '{{ route('wish.list.item.delete') }}',
                    data: {
                        'wishListItemID': wishListItemID,
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
