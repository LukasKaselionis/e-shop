<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('front.cart');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function add(Request $request)
    {
        $productId = $request->input('productId');
        $productPrice = $request->input('productPrice');
        $productName = $request->input('productName');
        if (!session()->exists('cart.' . $productId)) {
            session()->put('cart.' . $productId, [
                'product_id' => $productId,
                'quantity' => 0,
                'name' => $productName,
                'price' => $productPrice
            ]);
        }
        session()->increment('cart.' . $productId . '.quantity');
        return 'ok';
    }
}
