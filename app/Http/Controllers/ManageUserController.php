<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function studentRegister()
    {
        return view('ManageUserAccount.KioskParticipant.StudentRegistrationInterface');
    }

    public function vendorRegister()
    {
        return view('ManageUserAccount.KioskParticipant.VendorRegistrationInterface');
    }

    public function staffRegister()
    {
        return view('ManageUserAccount.KioskParticipant.StaffRegistrationInterface');
    }

}
