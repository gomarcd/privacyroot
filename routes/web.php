<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\AccountsController;

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

if (App::environment('production')) {
    URL::forceScheme('https');
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pricing', function() {
    return view('pricing');
})->middleware(['auth'])->name('pricing');

Route::get('/sogs', function() {
    return view('sogs');
})->middleware(['auth'])->name('sogs');

Route::get('/account', function() {
    return view('account');
})->middleware(['auth'])->name('account');

Route::get(
    '/confirmdelete',
    [AccountsController::class, 'destroy'])
    ->middleware(['auth'])->name('confirmdelete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';