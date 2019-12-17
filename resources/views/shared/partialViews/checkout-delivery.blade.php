@extends('shared.layouts.app')

@section('content')
    <div class="checkout-delivery">
        <form class="d-flex flex-column text-center justify-content-center align-items-center" action="">
            <div class="form-group w-25">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="form-group w-25">
                <label for="email">{{ __('Email') }}</label>
                <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>
            <div class="form-group w-25">
                <label for="phone">{{ __('Phone') }}</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <p>Payments</p>
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
            <div class="form-group">
                <p>Ship to</p>
            </div>
            <div class="form-group">
                <input class="btn btn-outline-success" type="submit" name="submit"
                       value="{{ __('Confirm') }}">
            </div>

        </form>
    </div>
@endsection