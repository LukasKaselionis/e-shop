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

    /**
     * @param $productId
     * @return RedirectResponse
     */
    public function destroy($productId): RedirectResponse
    {
        if (session('cart')[$productId]['quantity'] >= 0) {
            $selectCartQty = (int)session('cart')[$productId]['quantity'];
//            dd($selectCartQty);
            if (session()->decrement('cart.' . $productId . '.quantity') == 0) {
                session()->flush();
                return redirect()->route('cart');
            };
        }
    }

}
