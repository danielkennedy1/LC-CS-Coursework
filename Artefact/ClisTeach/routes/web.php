<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SerialController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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
})->name("home");

Route::get("/about", function () {
    return view("about");
})->name("about");

Route::get("/mission", function () {
    return view("mission");
})->name("mission");

Route::get("/product", function () {
    return view("products");
})->name("products");
Route::get("/product/{id}", [ProductController::class, "show"] )->name("product");

Route::get("/dashboard", function(){
    return view("dashboard");
})->name("dashboard");

Route::get("/overview", function(){
    return view("overview");
})->name("overview");

Auth::routes();

Route::get("/switch/{value}", [SerialController::class, "switch"])->name("switch")->where("value", "[0-1]");