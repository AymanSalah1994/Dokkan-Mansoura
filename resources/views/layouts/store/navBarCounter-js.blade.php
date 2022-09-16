<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        loadCart();
        loadWishList();
        // Once the Document is Ready Call Them
        function loadCart() {
            $.ajax({
                type: "GET",
                url: '{{ route('cart.counter') }}',
                success: function(response) {
                    // alert(response.cart_count);
                    // // Change the DOM
                    $('.cart_counter').html(response.cart_count);
                },
            });
        }

        function loadWishList() {
            $.ajax({
                type: "GET",
                url: '{{ route('wish.list.counter') }}',
                success: function(response) {
                    // alert(response.wish_list_count);
                    $('.wish_list_counter').html(response.wlc);
                },
            });
        }

        $('.addToCartBtn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();
            console.log(product_id);
            console.log(product_quantity);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: '{{ route('cart.add') }}',
                data: {
                    'product_id': product_id,
                    'product_quantity': product_quantity
                },
                success: function(response) {
                    console.log(response.status);
                    swal(response.status)
                    loadCart();
                },
                error: function(request, status, error) {
                    var reqError = JSON.parse(request.responseText);
                    console.log(reqError.message);
                    swal(reqError.message)
                }
            });
        });


        $('.addToWishListBtn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.product_id').val();
            console.log(product_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: "POST",
                url: '{{ route('wish-list.add') }}',
                data: {
                    'product_id': product_id,
                },
                success: function(response) {
                    console.log(response.status);
                    swal(response.status)
                    loadWishList();
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
