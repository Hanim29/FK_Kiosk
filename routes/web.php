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
use App\Http\Controllers\ApplicationController;
use App\Models\Application;

Route::get('/', [IndexController::class, 'index']);

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


//kiosk application
Route::resource('applications', 'ApplicationController');
// show the application interface
Route::get('/preview', function () {
    return view('ManageKioskApplication/updateappinterface');
});
Route::get('/ManageKioskApplication',[ApplicationController::class, 'index'])->name('applications');
Route::get('/ManageKioskApplication/create',[ApplicationController::class, 'create'])->name('applications.create');
Route::post('/ManageKioskApplication/store',[ApplicationController::class, 'store'])->name('applications.store');
Route::get('/applications/{id}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
Route::put('/applications/{id}/update', [ApplicationController::class, 'update'])->name('applications.update');
Route::delete('/applications/{id}/delete',[ApplicationController::class, 'delete'])->name('applications.delete');

Route::get('/preview/update', function () {
    return view('ManageKioskApplication/updateappinterface');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

//route for login
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\LoginController::class, 'loadDashboard'])->name('dashboard');
    Route::get('/dashboard/admin', [App\Http\Controllers\LoginController::class, 'loadDashboard'])->name('dashboard.Admin');
    Route::get('/dashboard/participant', [App\Http\Controllers\LoginController::class, 'loadDashboard'])->name('dashboard.Participant');
    Route::get('/dashboard/pupuk', [App\Http\Controllers\LoginController::class, 'loadDashboard'])->name('dashboard.Pupuk');
    Route::get('/dashboard/technical', [App\Http\Controllers\LoginController::class, 'loadDashboard'])->name('dashboard.Technical');
    Route::get('/dashboard/bursary', [App\Http\Controllers\LoginController::class, 'loadDashboard'])->name('dashboard.Bursary');
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



Route::get('/editProfile/participant', [App\Http\Controllers\ManageUserController::class, 'editProfileK'])->name('edit.participant');
Route::get('/editProfile/pupuk', [App\Http\Controllers\ManageUserController::class, 'editProfileP'])->name('edit.pupuk');
Route::get('/editProfile/technical', [App\Http\Controllers\ManageUserController::class, 'editProfileT'])->name('edit.technical');
Route::get('/editProfile/bursary', [App\Http\Controllers\ManageUserController::class, 'editProfileB'])->name('edit.bursary');


