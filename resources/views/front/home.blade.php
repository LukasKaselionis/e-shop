@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="card col-sm-4 col-md-3 col-lg-3 p-4 m-2">
                    <h5>Product name: </h5>
                    <p>{{ $product->name }}</p>
                    @if ($product->cover)
                        <img width="150" height="125" src="{{ asset('storage/'.$product->cover) }}"
                             alt="{{ $product->title }}">
                    @endif
                    <h5>Price: </h5>
                    <p>{{ $product->price }}</p>
                    <h5>Description: </h5>
                    <p>{{ $product->description }}</p>
                    <a onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }}, '{{ $product->cover }}');">
                        <button class="btn btn-success btn-block">Add</button>
                    </a>
                </div>
            @endforeach
        </div>
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
                success: function () {

                }
            }).done(function (msg) {
                alert(msg);
            })
        }
    </script>
@endsection
