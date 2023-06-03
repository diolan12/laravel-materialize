<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::group([
    'prefix' => '/'
], function ($router) {
    $router->get('/', [HomeController::class, 'index'])->name('public.index');
    $router->get('home', [HomeController::class, 'index']);
    $router->get('about', [HomeController::class, 'about'])->name('public.about');
    // $router->get('recaptcha', [AuthController::class, 'reCaptcha'])->name('auth.recaptcha');
    // $router->post('login', [AuthController::class, 'login'])->name('auth.login');
    // $router->post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    // $router->post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    // $router->post('me', [AuthController::class, 'me'])->name('auth.me');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'auth'
], function ($router) {
    $router->get('login', [AuthController::class, 'index'])->name('auth.index');
    $router->get('recaptcha', [AuthController::class, 'reCaptcha'])->name('auth.recaptcha');
    $router->post('login', [AuthController::class, 'login'])->name('auth.login');
    $router->post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    $router->post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
    $router->post('me', [AuthController::class, 'me'])->name('auth.me');
});

Route::group([
    'middleware' => 'web',
    'prefix' => 'dashboard'
], function ($router) {
    $router->post('login', [AuthController::class, 'login']);

    $router->get('/', function () {
        return redirect(route('scan-index'));
    })->name('dashboard');
});