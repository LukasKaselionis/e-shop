<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class CategoryController
 * @package App\Http\Controllers\Front
 */
class CategoryController extends Controller
{
    /**
     * @param string $slug
     * @return View
     */
    public function products(string $slug): View
    {
        $products = Product::query()
            ->whereHas('categories', function(Builder $query) use ($slug) {
                $query->where('slug', '=', $slug);
            })
            ->orderByDesc('created_at')
            ->paginate();

        return view('shared.partialViews.category_list', [
            'products' => $products,
        ]);
    }
}
