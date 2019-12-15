@extends('layouts.app')

@section('content')
    <div class="container">
        <ul class="product_list row">
            @foreach($products as $product)
                <li class="product col-xs-12 col-ms-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="product_container">
                        <div class="product-img-container">
                            @if ($product->cover)
                                <img class="product_img" width="150" height="125"
                                     src="{{ asset('storage/'.$product->cover) }}"
                                     alt="{{ $product->title }}">
                            @endif
                        </div>
                        <div class="product-name-container">
                            <p>{{ $product->name }}</p>
                        </div>
                        <div class="product-price-container">
                            <p>{{ $product->price }} €</p>
                        </div>
                        <div class="product-description-container">
                            <h5>Description: </h5>
                            <p>{{ $product->description }}</p>
                        </div>
                        <a onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->cover }}');">
                            <button class="button-add">Add</button>
                        </a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

@section('scripts')
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
                    console.log(data);
                    if (data) {
                        $(".cart-qty").text(data + ' items')
                    } else {
                        $(".cart-qty").text('cart')
                    }
                }
            });
        }
    </script>
@endsection


