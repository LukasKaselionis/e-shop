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
        $productCount = env('NEWEST_PRODUCTS_INDEX_LIMIT', 20);
        $dateBefore = Carbon::now()->subDays($productCount);
        $products = Product::query()
            ->orderByDesc('created_at')
            ->where('created_at','>', $dateBefore)
            ->paginate(10);

        return view('shared.partialViews.home', [
            'products' => $products
        ]);
    }
}
