<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

/**
 * Class DeliveryController
 * @package App\Http\Controllers\Front
 */
class DeliveryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('shared.partialViews.checkout-delivery', [
            'user' => $user
        ]);
    }
}
