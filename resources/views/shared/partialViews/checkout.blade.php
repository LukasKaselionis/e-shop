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
                            <td>{{ $item['price'] * $item['quantity'] }} €</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="form-wrapper">
            <form class="col-12 row" action="{{ route('checkout.place.order') }}" method="POST">
                <div class="col-12">
                    <h5>Billing Details</h5>
                </div>
                <div class="form-group col-sm-6 d-inline-block">
                    <label for="firstName">{{ __('First name') }}</label>
                    <input type="text" id="firstName" name="first_name" class="form-control shadow-sm"
                           placeholder="First name">
                </div>
                <div class="form-group col-sm-6 d-inline-block">
                    <label for="lastName">{{ __('Last name') }}</label>
                    <input type="text" id="lastName" name="last_name" class="form-control shadow-sm"
                           placeholder="Last name">
                </div>

                <div class="form-group col-sm-6 d-inline-block">
                    <label for="city">{{ __('City') }}</label>
                    <input type="text" id="city" name="city" class="form-control shadow-sm"
                           placeholder="City">
                </div>
                <div class="form-group col-sm-6 d-inline-block">
                    <label for="streetAddress">{{ __('Street address') }}</label>
                    <input type="text" id="streetAddress" name="street_address" class="form-control shadow-sm"
                           placeholder="Street address">
                </div>
                <div class="form-group col-sm-12 d-inline-block">
                    <label for="email">{{ __('Email') }}</label>
                    <input type="text" id="email" name="email" class="form-control shadow-sm"
                           value="{{ $user->email }}">
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group col-sm-12 d-inline-block">
                    <label for="phoneNumber">{{ __('Phone number') }}</label>
                    <input type="number" id="phoneNumber" name="phone_number" class="form-control shadow-sm"
                           placeholder="Phone number">
                </div>

                <div class="form-group col-sm-12 d-inline-block">
                    <label for="grandTotal">{{ __('Grand total:') }}</label>
                    <input type="text" id="grandTotal" name="grand_total" class="form-control shadow-sm"
                           value="{{ $grandTotal }}€" readonly="readonly">
                </div>

                <div class="form-group col-12 text-center">
                    <input type="submit" class="btn btn-success btn-lg" value="Place order">
                </div>
            </form>
        </div>
    </div>
@endsection