<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers\Admin
 */
class HomeController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {

        $admin = Auth::user();

        return view('admin.home', [
            'admins' => $admin]
        );
    }
}
