<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\SingleController;
use App\Http\Controllers\KukuController;
use App\Http\Controllers\ZaikoController;
use App\Http\Middleware\TimezoneBeforeMiddleware;
use App\Http\Middleware\TimezoneAfterMiddleware;
use App\Http\Controllers\ShiireController;
use App\Http\Controllers\ItemController;


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
    return view('welcome');
});
Route::get('hello', [HelloController::class, 'index']);
Route::get('kuku/{dan?}', [KukuController::class, 'index']);
Route::get('person/{sei?}/{mei?}', [HelloController::class, 'person']);
Route::get('single', [SingleController::class, '__invoke']);
// 在庫管理
Route::get('zaiko', [ZaikoController::class, 'index'])
    ->middleware(TimezoneBeforeMiddleware::class)
    ->middleware(TimezoneAfterMiddleware::class);
Route::get('shiire', [ShiireController::class, 'index']);
Route::post('shiire/create', [ShiireController::class, 'create']);
// 商品管理
Route::get('item', [ItemController::class, 'index']);
Route::get('item/search', [ItemController::class, 'search']);
Route::post('item/search', [ItemController::class, 'search']);
Route::get('item/add', [ItemController::class, 'add']);
Route::post('item/add', [ItemController::class, 'add']);
Route::get('item/edit', [ItemController::class, 'edit']);
Route::post('item/edit', [ItemController::class, 'edit']);
Route::get('item/delete', [ItemController::class, 'delete']);
Route::post('item/delete', [ItemController::class, 'delete']);
