@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="card col-sm-6 col-md-4">
                    <p class="card-title">{{ $product->name }}</p>
                    <h5>{{ $product->price }}</h5>
                    <p>{{ $product->description }}</p>
                    <a onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }});">
                        <button>Add</button>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function addToCart(id, name, price) {
            let token = '{{ csrf_token() }}';
            console.log(name);
            $.ajax({
                method: 'POST',
                url: '{{ route('cart.add') }}',
                data: {
                    productId: id,
                    _token: token,
                    productName: name,
                    productPrice: price
                }
            }).done(function (msg) {
                alert(msg);
            })
        }
    </script>
@endsection
