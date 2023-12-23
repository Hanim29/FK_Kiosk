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

Route::get('/', [IndexController::class, 'index']);

Route::get('/register/student', [ManageUserController::class, 'studentRegister'])->name('register.student');
Route::get('/register/vendor', [ManageUserController::class, 'vendorRegister'])->name('register.vendor');
Route::get('/register/staff', [ManageUserController::class, 'staffRegister'])->name('register.staff');

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
