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
use App\Models\Application;


Route::get('/', [IndexController::class, 'index'])->name("home");

Route::get('/register/student', [ManageUserController::class, 'studentRegister'])->name('register.student');
Route::get('/register/vendor', [ManageUserController::class, 'vendorRegister'])->name('register.vendor');
Route::get('/register/staff', [ManageUserController::class, 'staffRegister'])->name('register.staff');
Route::get('/register/staff', [ManageUserController::class, 'participantType'])->name('register.type');

Route::get('/preview', function () {
    return view('ManageUserAccount/Admin/AdminManageUserInterface');
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
Route::get('/ManageKioskApplication/{appID}/edit', [ApplicationController::class, 'edit'])->name('applications.edit');
Route::put('/ManageKioskApplication/{appID}/update', [ApplicationController::class, 'update'])->name('applications.update');
Route::delete('/applications/{appID}/delete',[ApplicationController::class, 'delete'])->name('applications.delete');

//Route::get('/preview/update', function () {
  //  return view('ManageKioskApplication/updateappinterface');
//});


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


Route::controller(ManageUserController::class)->group(function(){
    Route::get('/user_list', 'userList')->name('user_list');
    Route::delete('delete_user/{id}', 'deleteUser')->name('delete_user');
    Route::get('edit_user/{id}', 'editUser')->name('edit_user');//route to link to edit page
    Route::put('update_user/{id}', 'updateUser')->name('update_user');//route to update data
    Route::post('create_user', 'createUser')->name('create_user');//route to update data
    Route::get('/add_user','addUser')->name('add_user');//route to adduser page
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



Route::get('/editProfile/participant', [App\Http\Controllers\ManageUserController::class, 'editProfileK'])->name('edit.participant');
Route::get('/editProfile/pupuk', [App\Http\Controllers\ManageUserController::class, 'editProfileP'])->name('edit.pupuk');
Route::get('/editProfile/technical', [App\Http\Controllers\ManageUserController::class, 'editProfileT'])->name('edit.technical');
Route::get('/editProfile/bursary', [App\Http\Controllers\ManageUserController::class, 'editProfileB'])->name('edit.bursary');



