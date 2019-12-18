<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class DeliveryController
 * @package App\Http\Controllers\Front
 */
class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        return view('shared.partialViews.checkout', [
            'user' => $user,
            'cart' => $cart
        ]);
    }
}
