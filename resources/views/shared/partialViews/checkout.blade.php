@extends('shared.layouts.app')

@section('content')
    <div class="checkout-delivery">
        <div class="cart-details">
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($cart))
                    @foreach($cart as $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['price'] }}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="form-wrapper">
            <form class="col-12" action="" method="POST">
                <h5>Ship to</h5>
                <hr>
                <div class="form-group col-sm-4 d-inline-block">
                    <label for="firstName">{{ __('First name') }}</label>
                    <input type="text" id="firstName" name="firstName" class="form-control" value=""
                           placeholder="First name">
                </div>
                <div class="form-group col-sm-4 d-inline-block">
                    <label for="lastName">{{ __('Last name') }}</label>
                    <input type="text" id="lastName" name="lastName" class="form-control" value=""
                           placeholder="Last name">
                </div>
                <div class="orm-group col-sm-4 d-inline-block">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group col-sm-4 d-inline-block">
                    <label for="emailConfirm">{{ __('Confirm email') }}</label>
                    <input type="text" id="emailConfirm" name="emailConfirm" class="form-control" value=""
                           placeholder="Confirm email">
                </div>
                <div class="form-group col-sm-8 d-inline-block">
                    <label for="phoneNumber">{{ __('Phone number') }}</label>
                    <input type="number" id="phoneNumber" name="phoneNumber" class="form-control" value=""
                           placeholder="Phone number">
                </div>
                <div class="payments">
                    <h5>Payments</h5>
                    <hr>
                    <div class="form-group col-sm-4">
                        <input type="radio" id="PayPal" name="payment" value="PayPal"
                               checked>
                        <label for="PayPal">PayPal</label>
                        <input type="radio" id="mastercard" name="payment" value="mastercard"
                        >
                        <label for="mastercard">Mastercard</label>
                        <input type="radio" id="cash" name="payment" value="cash"
                        >
                        <label for="cash">Cash</label>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <input class="btn btn-outline-success" type="submit" name="submit"
                           value="{{ __('Confirm') }}">
                </div>
            </form>
        </div>
    </div>
@endsection