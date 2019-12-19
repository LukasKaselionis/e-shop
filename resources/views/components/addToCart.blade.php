<script>
    function addToCart(id, name, price, cover) {
        let token = '{{ csrf_token() }}';
        $.ajax({
            method: 'POST',
            url: '{{ route('cart.add') }}',
            data: {
                productId: id,
                _token: token,
                productName: name,
                productPrice: price,
                productCover: cover
            },
            success: function (data) {
                if (data) {
                    $(".cart-qty").text(data + ' items')
                } else {
                    $(".cart-qty").text('cart')
                }
            }
        });
    }
</script>

