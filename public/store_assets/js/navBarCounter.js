$(document).ready(function () {
    function loadCart() {}
    function loadWishList() {}
});

/*
$('.updateCartItem').click(function(e) {
    e.preventDefault();
    var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();
    var cartItemID = $(this).closest('.product_data').find('.cartItemID').val();
    console.log(product_quantity);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        method: "POST",
        url: '{{ route("cart.item.update") }}',
        data: {
            'product_quantity': product_quantity,
            'cartItemID'  :cartItemID
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
*/
