<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->shareCategoriesAsMenuOnFront();
    }

    private function shareCategoriesAsMenuOnFront(): void
    {
        $categories = collect();
        if (!Route::is('admin*') && Schema::hasTable('categories')) {
            $categories = Category::query()->get();
        }
        View::share('categories', $categories);
    }
}
