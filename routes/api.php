<?php

use Illuminate\Http\Request;
use App\Http\Controllers\APIAuthCtrl;
use App\Http\Controllers\APIMenuCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APITransCtrl;
use App\Http\Controllers\APICustomerCtrl;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('menus/{id_cat?}', [APIMenuCtrl::class, 'getAll']);
Route::get('menu_fav', [APIMenuCtrl::class, 'getFavorit']);
Route::get('category', [APIMenuCtrl::class, 'getCategory']);

// Auth
Route::post('login', [APIAuthCtrl::class, 'getLogin']);
Route::post('register', [APIAuthCtrl::class, 'register']);

// Transaksi
Route::get('trans/{id_cus}', [APITransCtrl::class, 'getTrans']);
Route::get('trans', [APITransCtrl::class, 'getAllTrans']);

// Member
Route::post('member', [APICustomerCtrl::class, 'save_member']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
