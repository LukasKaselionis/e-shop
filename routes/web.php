<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Middleware\RouteAccessMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// GUEST ROUTES

Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('/home', 'Front\HomeController@index')->name('home');
Route::post('cart/add', 'Front\CartController@add')->name('cart.add');
Route::get('cart', 'Front\CartController@cart')->name('cart');
Route::get('cart/{id}', 'Front\CartController@destroy')->name('cart.item.destroy');

Route::get('products/{slug}', 'Front\CategoryController@products')->name('products.category');

Auth::routes();

// USER ROUTES
Route::middleware('auth')->group(function () {
    Route::get('/checkout', 'Front\CheckoutController@getCheckout')->name('checkout.index');
    Route::post('/checkout/order', 'Front\CheckoutController@placeOrder')->name('checkout.place.order');
});

// ADMIN ROUTES

Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
    Route::namespace('Auth')->group(function () {
        //Login Routes
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        Route::middleware(RouteAccessMiddleware::ALIAS)->group(function () {
            Route::prefix('administrator')->name('administrator.')->group(function () {
                Route::get('/', 'AdminController@index')
                    ->name('index');
                Route::get('{admin}/edit', 'AdminController@edit')
                    ->name('edit');
                Route::put('{admin}', 'AdminController@update')
                    ->name('update');
            });

            Route::prefix('role')->name('role.')->group(function () {
                Route::get('/', 'RoleController@index')
                    ->name('index');
                Route::get('{role}/edit', 'RoleController@edit')
                    ->name('edit');
                Route::put('{role}', 'RoleController@update')
                    ->name('update');
            });

            Route::resource('category', 'CategoryController')->except(['show']);
            Route::resource('product', 'ProductController');
        });
    });
});

