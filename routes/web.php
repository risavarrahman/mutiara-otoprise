<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CRMVendorController;
use App\Http\Controllers\CRMCalendarController;
use App\Http\Controllers\CRMCustomerController;

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

Route::get('/', function () {
    return redirect('/login');
});


Route::middleware('PreventBackHistory')->group(function () {
    Auth::routes();
});

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('customer/search', [CRMCustomerController::class, 'search'])->name('
    customer.search');
    Route::get('customer/{id}/delete', [CRMCustomerController::class, 'destroy'])->name('
    customer.destroy');
    Route::resource('customer', CRMCustomerController::class)->except('show');

    Route::get('vendor/search', [CRMVendorController::class, 'search'])->name('vendor.search');
    Route::get('vendor/{id}/delete', [CRMVendorController::class, 'destroy'])->name('
    vendor.destroy');
    Route::resource('vendor', CRMVendorController::class)->except('show');

    Route::resource('calendar', CRMCalendarController::class);
});

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');

    Route::get('calendar', [CRMCalendarController::class, 'index'])->name('calendar.index');

    // Route::resource('calendar', CRMCalendarController::class);
});
