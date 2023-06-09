<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\StepperController;
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
    $router->group(['prefix' => '/table'], function($router){
        $router->get('/tabulator', [TableController::class, 'tabulator'])->name('dashboard.tabulator');
        $router->get('/datatable-php', [TableController::class, 'datatablePHP'])->name('dashboard.datatable-php');
        $router->get('/datatable-js', [TableController::class, 'datatableJS'])->name('dashboard.datatable-js');
    });
    $router->get('/map', [MapController::class, 'index'])->name('dashboard.map');

    $router->group(['prefix' => '/stepper'], function($router){
        $router->get('/', [StepperController::class, 'index'])->name('dashboard.stepper');
        $router->post('/check-email', [StepperController::class, 'checkEmail'])->name('dashboard.stepper-email');
    });
    
    $router->group(['prefix' => '/account'], function($router){
        $router->get('/', [AccountController::class, 'index'])->name('dashboard.account');
    });
    $router->group(['prefix' => '/post'], function($router){
        $router->get('/', [PostController::class, 'index'])->name('dashboard.post');
        $router->get('/{uuid}', [PostController::class, 'postAt'])->name('dashboard.post-at');
    });
});