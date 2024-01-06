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
use App\Http\Controllers\salesController;

Route::get('/', [IndexController::class, 'index'])->name("home");

Route::get('/register/student', [ManageUserController::class, 'studentRegister'])->name('register.student');
Route::get('/register/vendor', [ManageUserController::class, 'vendorRegister'])->name('register.vendor');
Route::get('/register/staff', [ManageUserController::class, 'staffRegister'])->name('register.staff');
Route::get('/register/staff', [ManageUserController::class, 'participantType'])->name('register.type');

Route::get('/preview/student', function () {
    return view('ManageUserAccount/KioskParticipant/ParticipantTypeInterface');
});

Route::get('/complaint',function(){
    return view('/ManageComplaint/MakeComplaint');

    // Route::get('/MakeComplaint/add',[ComplaintController::class,'add']); //pergi ke page lain dari button detail
    Route::prefix('MakeComplaint')
    ->as('MakeComplaint.')
    ->group(function () {
        Route::get('/add', [ComplaintController::class, 'add']);

    //     Route::post('/createBicycle', [ManageBicycleController::class, 'create']);
    //     Route::get('/{id}/delete', [ManageBicycleController::class, 'delete']);
    //     Route::get('/{id}/edit', [ManageBicycleController::class, 'edit']);
    //     Route::post('/{id}/update', [ManageBicycleController::class, 'update']);
    });


    Route::get('/MakeComplaint/create',[ComplaintController::class,'create']); //submit complaint
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

// route for manage sale report
Route::middleware('auth')->group(function () {
    // show the sale report interface
    Route::get('/sales', [salesController::class, 'index'])->name("sales.index");
    // show the add sale report form
    Route::view('/sales/add', 'ManageSalesReport.AddSalesInterface')->name("sales.add.show");
    // perform the add sale report
    Route::post('/sales/add', [salesController::class, 'AddSales'])->name("sales.add.perform");
    // show the update sale report
    Route::view('/sales/update', 'ManageSalesReport.UpdateSalesInterface')->name("sales.update.show");
    //update the sale report
    Route::post('/sales/update', [salesController::class, 'UpdateSales'])->name("sales.update.perform");
    // view sales report
    Route::view('/sales/view', 'ManageSalesReport.ViewSalesInterface')->name("sales.view");
    // fetch sales date
    Route::get('/sales/view/get', [salesController::class, 'ViewSales'])->name("sales.view.get");
    // view report for delete
    Route::view('/sales/delete', 'ManageSalesReport.ViewSalesInterface')->name('sales.delete'); 
    // delete the report   
    Route::delete('/sales/delete', [salesController::class, 'DeleteSales'])->name('sales.delete.perform');    
    // view report for add comment
    Route::view('/sales/comment', 'ManageSalesReport.ViewSalesInterface')->name("sales.comment");
    // add the comment
    Route::post('/sales/comment', [salesController::class, 'AddComment'])->name("sales.comment.perform");

});