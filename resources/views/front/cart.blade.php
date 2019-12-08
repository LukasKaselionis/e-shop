@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if(!empty($cart))
                @foreach($cart as $item)
                    @if($item['quantity'] > 0)
                        <div class="card col-sm-4 col-md-3 p-4 m-2">
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
        </div>
        <div class="text-center">
            <div>
                <a href="{{ route('home') }}">
                    <button class="btn btn-outline-info m-2">< Choose more products</button>
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
                <div class="col-12 text-center">

                    <p>Cart is empty</p>
                    <div>
                        <a href="{{ route('home') }}">
                            <button class="btn btn-outline-info">< Choose more products</button>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
