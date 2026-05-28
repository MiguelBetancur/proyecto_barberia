<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\AdvertisementController;
use \App\Http\Controllers\ReviewController;
use \App\Http\Controllers\ReserveController;
use \App\Http\Controllers\PaymentController;
use \App\Http\Controllers\ServiceController;
use \App\Http\Controllers\Reserve_ServiceController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('/principal', [HomeController::class, 'principal'])->name('principal')->middleware('auth');

Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
Route::get('/roles/{id}', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');

Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/advertisements', [AdvertisementController::class, 'index'])->name('advertisements.index');
Route::post('/advertisements', [AdvertisementController::class, 'store'])->name('advertisements.store');
Route::delete('/advertisements/{id}', [AdvertisementController::class, 'destroy'])->name('advertisements.destroy');
Route::get('/advertisements/{id}', [AdvertisementController::class, 'edit'])->name('advertisements.edit');
Route::put('/advertisements/{id}', [AdvertisementController::class, 'update'])->name('advertisements.update');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('/reviews/{id}', [ReviewController::class, 'edit'])->name('reviews.edit');
Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('reviews.update');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');
Route::get('/services/{id}', [ServiceController::class, 'edit'])->name('services.edit');
Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');

Route::get('/reserves', [ReserveController::class, 'index'])->name('reserves.index');
Route::post('/reserves', [ReserveController::class, 'store'])->name('reserves.store');
Route::delete('/reserves/{id}', [ReserveController::class, 'destroy'])->name('reserves.destroy');
Route::get('/reserves/{id}', [ReserveController::class, 'edit'])->name('reserves.edit');
Route::put('/reserves/{id}', [ReserveController::class, 'update'])->name('reserves.update');

Route::get('/reserve_services', [Reserve_ServiceController::class, 'index'])->name('reserve_services.index');
Route::post('/reserve_services', [Reserve_ServiceController::class, 'store'])->name('reserve_services.store');
Route::delete('/reserve_services/{id}', [Reserve_ServiceController::class, 'destroy'])->name('reserve_services.destroy');
Route::get('/reserve_services/{id}', [Reserve_ServiceController::class, 'edit'])->name('reserve_services.edit');
Route::put('/reserve_services/{id}', [Reserve_ServiceController::class, 'update'])->name('reserve_services.update');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
Route::delete('/payments/{id}', [PaymentController::class, 'destroy'])->name('payments.destroy');
Route::get('/payments/{id}', [PaymentController::class, 'edit'])->name('payments.edit');
Route::put('/payments/{id}', [PaymentController::class, 'update'])->name('payments.update');

Route::get('/graficas', function () {
    return view('apis.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home/admin', [HomeController::class, 'admin'])->name('home.admin');
    Route::get('/home/barber', [HomeController::class, 'barber'])->name('home.barber');
    Route::get('/home/cliente', [HomeController::class, 'cliente'])->name('home.cliente');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/download-pdf', [UserController::class, 'generar_pdf'])->name('descargarPDF');
Route::get('/download-pdfPayments', [PaymentController::class, 'generar_pdf'])->name('descargarPDFPayments');
