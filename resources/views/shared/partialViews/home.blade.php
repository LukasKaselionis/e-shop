@extends('shared.layouts.app')

@section('content')
    <ul class="card_list row">
        @foreach($products as $product)
            <li class="product col-xs-12 col-ms-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card_container">
                    <div class="card-img-container">
                        @if ($product->cover)
                            <img class="card_img" width="150" height="125"
                                 src="{{ asset('storage/'.$product->cover) }}"
                                 alt="{{ $product->title }}">
                        @endif
                    </div>
                    <div class="card-name-container">
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="card-price-container">
                        <p>{{ $product->price }} €</p>
                    </div>
                    <div class="card-description-container">
                        <h5>Description: </h5>
                        <p>{{ $product->description }}</p>
                    </div>
                    <a onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->cover }}');">
                        <button class="card-button">Add</button>
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
    <div class="card-paginate">
        {{ $products->links() }}
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


