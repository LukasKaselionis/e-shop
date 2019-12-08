@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($cart))
            @foreach($cart as $item)
                @if($item['quantity'] > 0)
                    <div class="card col-sm-6 col-md-4">
                        <h5>Product name: </h5>
                        <p>{{$item['name']}}</p>
                        @if ($item['cover'])
                            <img width="150" height="100" src="{{ asset('storage/'.$item['cover']) }}"
                                 alt="{{ $item['name'] }}">
                        @endif
                        <p>Quantity: {{ $item['quantity'] }}</p>
                        <p>Price: {{ $item['price'] }}</p>
                        <a href="{{ route('cart.item.destroy', $item['product_id']) }}">
                            <button class="btn btn-outline-danger">decrease</button>
                        </a>
                    </div>
                @endif
            @endforeach
            <div>
                <a href="{{ route('home') }}">
                    <button class="btn btn-outline-info">< Choose more products</button>
                </a>
            </div>
            @guest
                <a href="{{ route('login') }}">
                    <button class="btn btn-primary">Login</button>
                </a>
                or
                <a href="{{ route('register') }}">
                    <button class="btn btn-success">Register</button>
                </a>
            @endguest
            @Auth
                <a href="{{ route('checkout.delivery') }}">
                    <button class="btn btn-outline-success">Continue</button>
                </a>
            @endauth
        @else
            <p>Cart is empty</p>
            <div>
                <a href="{{ route('home') }}">
                    <button class="btn btn-outline-info">< Choose more products</button>
                </a>
            </div>
        @endif
    </div>
@endsection
