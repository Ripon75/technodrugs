<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Frontend\PageController;

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
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

// home route
Route::get('/',                [PageController::class, 'home'])->name('home');
// product route
Route::get('/products',        [PageController::class, 'productIndex'])->name('products');
Route::get('/product/{name}',  [PageController::class, 'productSingle'])->name('product.single');
// news route
Route::get('/news',            [PageController::class, 'newsIndex']);
Route::get('/news/{slug}',     [PageController::class, 'newsSingle']);
// about page
Route::get('/about',           [PageController::class, 'about'])->name('about');
Route::get('/contact',         [PageController::class, 'contact'])->name('contact');
Route::get('/mission-vision',  [PageController::class, 'missionVision'])->name('missionVision');
Route::get('/history',         [PageController::class, 'history'])->name('history');
Route::get('/message-from-md',   [PageController::class, 'messageFromMD'])->name('message.from-md');
