<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{
//FROM LOGIN PAGE TO THIS DASHBOARD PAGE
    public function __construct()
    {
        $this->middleware('auth');
    }
    //authorize session from user type
    public function loadDashboard()
    {
        $account_type = Auth::user()->account_type;

        if ($account_type == 'Admin') {
            return view('AdminDashboard');
        }

        if ($account_type == 'student') {
            return view('KioskParticipantDashboard');
        }

        if ($account_type == 'vendor') {
            return view('KioskParticipantDashboard');
        }

        if ($account_type == 'pupuk') {
            return view('PupukAdminDashboard');
        }

        if ($account_type == 'technical') {
            return view('TechnicalTeamDashboard');
        }

        if ($account_type == 'bursary') {
            return view('BursaryDashboard');
        }
    }

    public function create() //create =method 
    {
        //
        //$blogs = Blog::get(); //Select * FROM users, guna model User untuk access database
      
        return view('blogs.create');//tambah return untuk display data 
        //compact('blogs'), //send data daripada declare ($) kepada index.blade (compact), mesti sama nama dengan $
    //); 
    }

}