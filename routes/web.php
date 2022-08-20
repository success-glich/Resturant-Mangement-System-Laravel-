<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
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
//     return view('welcome');
// });


Route::get("/",[HomeController::class,"index"]);
Route::get("/users",[AdminController::class,"users"]);
Route::get("/foodmenu",[AdminController::class,"foodmenu"]);
Route::get("/deletemenu/{id}",[AdminController::class,"deletemenu"]);
Route::get("/updatefood/{id}",[AdminController::class,"updatefood"]);
Route::post("/update/{id}",[AdminController::class,"update"]);
Route::post("/updatefoodchef/{id}",[AdminController::class,"updatefoodchef"]);
Route::post("/uploadfood",[AdminController::class,"uploadfood"]);
Route::post("/uploadchef",[AdminController::class,"uploadchef"]);
Route::get("/viewreservation",[AdminController::class,"viewreservation"]);
Route::get("/deleteuser/{id}",[AdminController::class,"deleteusers"]);
Route::get("/deletechef/{id}",[AdminController::class,"deletechef"]);
Route::get("/updatechef/{id}",[AdminController::class,"updatechef"]);
Route::get("/redirects",[HomeController::class,"redirects"]);
Route::post("/reservation",[AdminController::class,"reservation"]);

Route::post("/addcart/{id}",[HomeController::class,"addcart"]);
Route::post("/orderconfirm",[HomeController::class,"orderconfirm"]);

Route::get("/showcart/{id}",[HomeController::class,"showcart"]);

Route::get("/remove/{id}",[HomeController::class,"remove"]);



Route::get("/viewchef",[AdminController::class,"viewchef"]);
Route::get("/orders",[AdminController::class,"orders"]);
Route::get("/search",[AdminController::class,"search"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
