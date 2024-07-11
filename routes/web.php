<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ClientController;
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

//Route::get('/', function () {
//    \App\Events\CarOptionsEvent::dispatch(['test']);
//    return view('welcome');
//});
Route::get('/', [ClientController::class,'login'])->name('login');
//Route::post('/', [ClientController::class,'login_submit'])->name('login');

Route::group(['middleware'=>['Install','Locale']],function(){

    include('client.php');
    include('ajax.php');
});