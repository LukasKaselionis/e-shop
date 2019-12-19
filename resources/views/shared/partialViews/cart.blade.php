@extends('shared.layouts.app')

@section('content')
    <div class="breadcrumb justify-content-center">
        Shopping cart
    </div>
    <div class="card_list row text-center">
        @if(!empty($cart))
            @foreach($cart as $item)
                @if($item['quantity'] > 0)
                    <div class="card col-md-3 p-2 shadow-sm">
                        <h5>Product name: </h5>
                        <p>{{$item['name']}}</p>
                        @if ($item['cover'])
                            <img width="130" height="150" src="{{ asset('storage/'.$item['cover']) }}"
                                 alt="{{ $item['name'] }}">
                        @endif
                        <p>Quantity: {{ $item['quantity'] }}</p>
                        <p>Price: {{ $item['price'] }} €</p>
                        <a href="{{ route('cart.item.destroy', $item['product_id']) }}">
                            <button class="btn btn-danger">Remove</button>
                        </a>
                    </div>
                @endif
            @endforeach
    </div>
    <div class="text-center">
        <div>
            <a href="{{ route('home') }}">
                <button class="btn btn-info m-2">< Choose more products</button>
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
            <div class="col-12 text-center pt-5">

                <p>Cart is empty</p>
                <div>
                    <a href="{{ route('home') }}">
                        <button class="btn btn-info">< Choose more products</button>
                    </a>
                </div>
            </div>
        @endif
    </div>
@endsection
