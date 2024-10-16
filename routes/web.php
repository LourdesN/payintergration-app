<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PaymentController::class)
->prefix('payments')
->as('payments')
->group(function(){
    Route::get('/token','token')->name('token');
    Route::get('/initiateSTKPush','initiateSTKPush')->name('initiateSTKPush');
    Route::post('/stkCallback', 'stkCallback')->name('stkCallback');
    Route::get('/stkquery','stkQuery')->name('stkquery');
    Route::get('/registerurl','registerUrl')->name('registerurl');
    Route::post('/validation','Validation')->name('validation');
    Route::post('/confirmation','Confirmation')->name('confirmation');
    Route::get('/simulate','Simulate')->name('simulate');
    Route::get('/qrcode','qrcode')->name('qrcode');
});

Route::post('/initiateSTKPush', [PaymentController::class, 'initiateStkPush'])->name('payments.initiateSTKPush');


Route::get('/stk_push_form', function () {
    return view('payments.stk_push_form');
})->name('payments.stk_push_form');

Route::get('/qrcode', [PaymentController::class, 'qrcode'])->name('payments.qrcode');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
