<?php

use App\Http\Controllers\AuthCtrl;
use App\Http\Controllers\MenuCtrl;
use App\Http\Controllers\TableCtrl;
use App\Http\Controllers\TransCtrl;
use App\Http\Controllers\ReportCtrl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCtrl;
use App\Http\Controllers\KitchensCtrl;
use App\Http\Controllers\CustomersCtrl;
use App\Http\Controllers\DashboardCtrl;

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

Route::group(["middleware" => "auth"], function () {

    Route::get('/', [DashboardCtrl::class, "index"]);

    // Route Customers
    Route::resource('customers', CustomersCtrl::class)->middleware("roleOpr");;
    Route::get('cus/form', [CustomersCtrl::class, "create"])->middleware("roleAdmin");
    // Route Category
    Route::get("category", [CategoryCtrl::class, "index"])->middleware("roleOpr");
    Route::group(["middleware" => "roleAdmin"], function () {
        Route::get("category/form/{id_cat?}", [CategoryCtrl::class, "form"]);
        Route::get("category/delete/{id_cat}", [CategoryCtrl::class, "delete"]);
        Route::post("category/save", [CategoryCtrl::class, "save"]);
    });

    // Route Menu
    Route::controller(MenuCtrl::class)->group(function () {
        Route::get("menu", "index")->middleware("roleOpr");
        Route::get("menu/form/{id_menu?}", "form")->middleware("roleAdmin");
        Route::get("menu/delete/{id_menu}", "delete")->middleware("roleAdmin");
        Route::post("menu/save", "save")->middleware("roleAdmin");
    });

    // Route Kitchens
    Route::controller(KitchensCtrl::class)->group(function () {
        Route::get("kitchens", "index")->middleware("roleOpr");
        Route::get("kitchens/form/{id_kitc?}", "form")->middleware("roleAdmin");
        Route::get("kitchens/delete/{id_kitc}", "delete")->middleware("roleAdmin");
        Route::post("kitchens/save", "save")->middleware("roleAdmin");
    });

    //Route Table
    Route::get('table', [TableCtrl::class, 'index']);
    Route::get('table/form/{id_tbl?}', [TableCtrl::class, 'form']);
    Route::get('table/delete/{id_tbl}', [TableCtrl::class, 'delete']);
    Route::post('table/save', [TableCtrl::class, 'save']);

    Route::group(["middleware" => "roleOpr"], function () {
        // Transaksi
        Route::get("transaction", [TransCtrl::class, "index"]);
        Route::get("transaction/form", [TransCtrl::class, "form"]);
        Route::post("transaction/save", [TransCtrl::class, "save"]);
        Route::get("transaction/nota/{id}", [TransCtrl::class, "nota"]);
        Route::get("transaction/{id}/{status}", [TransCtrl::class, "update_status"]);
    });


    // Report
    Route::get("report/transaction", [ReportCtrl::class, "rpt_transaction"])->middleware("roleAdmin");

    // Auth Logout hanya bisa di akses jika sudah login
    Route::get("auth/logout", [AuthCtrl::class, "logout"])->name("signout"); // Dengan nama route   
});

// Auth
Route::get("auth/login", [AuthCtrl::class, "login"])->name("login"); // Dengan nama route
Route::post("auth/login", [AuthCtrl::class, "cek_login"]);
Route::get("auth/registrasi", [AuthCtrl::class, "registrasi"])->name("signup"); // Dengan nama route
Route::post("auth/registrasi", [AuthCtrl::class, "save_registrasi"]);
