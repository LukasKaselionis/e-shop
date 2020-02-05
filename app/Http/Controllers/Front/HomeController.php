<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\View\View;

/**
 * Class HomeController
 * @package App\Http\Controllers\Front
 */
class HomeController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $products = Product::query()
            ->orderByDesc('created_at')
            ->paginate();

        return view('shared.partialViews.home', [
            'products' => $products
        ]);
    }
}
