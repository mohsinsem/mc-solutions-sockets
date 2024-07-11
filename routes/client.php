<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use \App\Http\Controllers\Auth\ClientController;
use App\Http\Controllers\Client\ProfileController;

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

/******* login/register *******/
Route::group(['middleware' => 'ClientGuest', 'as' => 'client.'], function () {
    Route::get('/login', [ClientController::class,'login'])->name('login');
    Route::post('/login', [ClientController::class,'login_submit'])->name('login_submit');
});
/******* login/register *******/

/******* Client panel controls *******/
Route::group(['prefix' => 'client', 'as' => 'client.', 'namespace' => 'Client', 'middleware' => 'Client'], function () {
	
    /******* Dashboard *******/

    /******* Profile *******/
    Route::get('profile', [ProfileController::class,'edit'])->name('profile');
    Route::post('profile/carOptions', [ProfileController::class,'carOptions'])->name('load-car-options');
    Route::post('profile/update', [ProfileController::class,'update'])->name('profile.update');

    /******* Profile *******/


});


