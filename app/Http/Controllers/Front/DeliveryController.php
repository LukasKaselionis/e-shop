<?php

declare(strict_types=1);

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class DeliveryController
 * @package App\Http\Controllers\Front
 */
class DeliveryController extends Controller
{
    public function index()
    {
        return view('front.checkout-delivery');
    }
}
