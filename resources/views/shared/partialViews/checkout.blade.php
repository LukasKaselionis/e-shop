@extends('shared.layouts.app')

@section('content')
    <div class="checkout-delivery">
        <div class="cart-details">
            <table class="table table-striped table-light">
                <thead class="thead-dark">
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
                            <td>{{ $item['price'] }} €</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="form-wrapper">
            <div class="col-12">
                <h5>Ship to</h5>
            </div>
            <form class="col-12 row" action="" method="POST">
                <div class="form-group col-sm-6 d-inline-block">
                    <label for="firstName">{{ __('First name') }}</label>
                    <input type="text" id="firstName" name="firstName" class="form-control shadow-sm" value=""
                           placeholder="First name">
                </div>
                <div class="form-group col-sm-6 d-inline-block">
                    <label for="lastName">{{ __('Last name') }}</label>
                    <input type="text" id="lastName" name="lastName" class="form-control shadow-sm" value=""
                           placeholder="Last name">
                </div>
                <div class="orm-group col-sm-6 d-inline-block">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" id="email" name="email" class="form-control shadow-sm"
                           value="{{ $user->email }}">
                </div>
                <div class="form-group col-sm-6 d-inline-block">
                    <label for="emailConfirm">{{ __('Confirm email') }}</label>
                    <input type="text" id="emailConfirm" name="emailConfirm" class="form-control shadow-sm" value=""
                           placeholder="Confirm email">
                </div>
                <div class="form-group col-sm-12 d-inline-block">
                    <label for="phoneNumber">{{ __('Phone number') }}</label>
                    <input type="number" id="phoneNumber" name="phoneNumber" class="form-control shadow-sm" value=""
                           placeholder="Phone number">
                </div>
                <div class="payments col-12">
                    <h5>Payments</h5>
                    <hr>
                    <div class="form-group col-sm-12 text-center font-italic">
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
                <div class="form-group col-12 text-center">
                    <input class="btn btn-success btn-lg" type="submit" name="submit"
                           value="{{ __('Confirm') }}">
                </div>
            </form>
        </div>
    </div>
@endsection