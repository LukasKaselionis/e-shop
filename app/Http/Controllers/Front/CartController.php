<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class CartController
 * @package App\Http\Controllers\Front
 */
class CartController extends Controller
{
    /**
     * @return Factory|View
     */
    public function cart(): View
    {
        $cart = session()->get('cart');
        return view('front.cart', [
            'cart' => $cart
        ]);
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
        $productCover = $request->input('productCover');
        if (!session()->exists('cart.' . $productId)) {
            session()->put('cart.' . $productId, [
                'product_id' => $productId,
                'cover' => $productCover,
                'quantity' => 0,
                'name' => $productName,
                'price' => $productPrice
            ]);
        }
        session()->increment('cart.' . $productId . '.quantity');
        return count(session()->get('cart'));
    }

    /**
     * @param $productId
     * @return RedirectResponse
     */
    public function destroy($productId): RedirectResponse
    {
        if (session()->exists('cart.' . $productId . '.quantity')) {
            session()->decrement('cart.' . $productId . '.quantity');
        }

        if (session()->get('cart.'.$productId.'.quantity') <= 0) {
            session()->forget('cart.'.$productId);
        }

        return redirect()->route('cart');
    }
}
