<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleSheetController;

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

Route::get('/', [RuteController::class, 'index']);
Route::get('/about', [RuteController::class, 'about']);

Route::get('/loginpgadminwv2', [AdminController::class, 'index'])->name('index');
Route::get('/admin_katalog', [RuteController::class, 'katalog'])->name('katalog');
Route::get('/dashboard', [RuteController::class, 'dashboard'])->name('dashboard');

Route::get('/form/{kode}', [FormController::class, 'index'])->name('index');
Route::post('/add_katalog', [AdminController::class, 'store'])->name('store');
Route::post('/form/submit', [FormController::class, 'submitForm'])->name('submitForm');
Route::post('/uploadPdf', [PdfController::class, 'uploadPdf'])->name('upload.pdf');

Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/submit-payment', [FormController::class, 'submitPayment'])->name('submitPayment');


Route::get('/adduseradmwova2', [RuteController::class, 'add_user'])->name('add_user');
Route::post('/loginadmwv', [AdminController::class, 'login'])->name('login');

Route::get('/contoh', function () {
    return view('c1');
});

Route::resource('users', UserController::class);

Route::get('/katalogs/delete/{id}', [AdminController::class, 'destroy']);
