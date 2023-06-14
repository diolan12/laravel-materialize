<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\TableController;
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

Route::group([
    'prefix' => '/'
], function ($router) {
    $router->get('/', [HomeController::class, 'index'])->name('public.home');
    $router->get('home', [HomeController::class, 'index']);
    $router->get('about', [HomeController::class, 'about'])->name('public.about');
});

Route::group([
    'prefix' => 'auth'
], function ($router) {
    $router->get('login', [AuthController::class, 'index'])->name('auth.index');
    $router->get('recaptcha', [AuthController::class, 'reCaptcha'])->name('auth.recaptcha');
    $router->post('login', [AuthController::class, 'login'])->name('auth.login');
    $router->group([
        'middleware' => 'auth:web'
    ], function ($router) {
        $router->get('logout', [AuthController::class, 'logout'])->name('auth.logout');
        $router->get('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
        $router->get('me', [AuthController::class, 'me'])->name('auth.me');
    });
});

Route::group([
    'middleware' => 'auth:web',
    'prefix' => 'dashboard'
], function ($router) {
    $router->get('/', [StatsController::class, 'index'])->name('dashboard');
    $router->get('/stats', [StatsController::class, 'index'])->name('dashboard.stats');
    $router->get('/table', [TableController::class, 'index'])->name('dashboard.table');
    $router->get('/map', [MapController::class, 'index'])->name('dashboard.map');
});