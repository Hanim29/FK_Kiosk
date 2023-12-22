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

Route::get('/', [IndexController::class, 'index']);
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

