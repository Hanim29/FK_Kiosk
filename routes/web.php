<?php

use App\Http\Controllers\ComplaintController;
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

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\paymentController;

Route::get('/', [IndexController::class, 'index']);

Route::get('/register/student', [ManageUserController::class, 'studentRegister'])->name('register.student');
Route::get('/register/vendor', [ManageUserController::class, 'vendorRegister'])->name('register.vendor');
Route::get('/register/staff', [ManageUserController::class, 'staffRegister'])->name('register.staff');
Route::get('/register/staff', [ManageUserController::class, 'participantType'])->name('register.type');

Route::get('/preview/student', function () {
    return view('ManageUserAccount/KioskParticipant/ParticipantTypeInterface');
});

Route::prefix('/complaint')->name('complaint.')->controller(ComplaintController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/add', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/show/{id}', 'show')->name('show');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('/destroy/{id}', 'destroy')->name('destroy');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// route for manage payment
Route::middleware('auth')->group(function () {
    // show the payment interface
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');

    // show the participant payment form
    Route::get('/payments/create', [PaymentController::class, 'indexPayment'])->name('payments.create');

    // add payment to the database
    Route::post('/payments/perform', [PaymentController::class, 'AddPayment'])->name('payments.perform');

    // show the receipt after payment
    Route::get('/payments/view/{paymentID}', [PaymentController::class, 'ViewPayment'])->name('payments.show');

    // show update payment form
    Route::get('/payments/update/{appID}', [PaymentController::class, 'indexUpdate'])->name('payments.update.show');

    // update the payment record on the databse
    Route::post('/payments/update/{paymentID}', [PaymentController::class, 'UpdatePayment'])->name('payments.update.perform');

    Route::delete('/payments/{paymentID}', [PaymentController::class, 'DeletePayment'])->name('payments.delete');

});
