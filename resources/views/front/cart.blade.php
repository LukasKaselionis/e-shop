@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!empty($cart))
            @foreach($cart as $item)
                @if($item['quantity'] > 0)
                    <div class="card col-sm-6 col-md-4">
                        <p class="card-title">Name: {{$item['name']}}</p>
                        <p>Quantity: {{ $item['quantity'] }}</p>
                        <p>Price: {{ $item['price'] }}</p>
                        <a href="{{ route('cart.item.destroy', $item['product_id']) }}">
                            <button>x</button>
                        </a>
                    </div>
                @endif
            @endforeach
        @else
            <p>Cart is empty</p>
        @endif
    </div>
@endsection
