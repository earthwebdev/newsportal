<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [FrontController::class, 'landingPage'])->name('landing-page');
Route::get('/articles/{slug}', [FrontController::class, 'articleView'])->name('article-page');
Route::get('/categories/{slug}', [FrontController::class, 'categoryView'])->name('category-page');


Route::group([
    'prefix'=> 'backend',
    'middleware' => ['authorize']
],
    function(){
        Route::resource('category', CategoryController::class)->names('category');
        Route::resource('article', ArticleController::class)->names('article');
});
