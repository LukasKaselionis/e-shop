<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class DeliveryController
 * @package App\Http\Controllers\Front
 */
class CheckoutController extends Controller
{
    public function getCheckout()
    {
        $user = Auth::user();
        $cart = session()->get('cart');

        $subtotal = [];

        foreach ($cart as $item) {
            $price = $item['price'];
            $qty = $item['quantity'];
            array_push($subtotal, $price * $qty);
        }

        $grandTotal = array_sum($subtotal);

        return view('shared.partialViews.checkout', [
            'user' => $user,
            'cart' => $cart,
            'grandTotal' => $grandTotal
        ]);

    }

    public function placeOrder(Request $request)
    {

    }
}
