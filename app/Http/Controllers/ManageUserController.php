<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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

    public function participantType()
    {
        return view('ManageUserAccount.KioskParticipant.ParticipantTypeInterface');
    }


    public function editProfileK()
    {
        return view('ManageUserAccount.KioskParticipant.ManageUserInterface');
    }

    public function editProfileT()
    {
        return view('ManageUserAccount.FKTechnicalTeam.ManageUserInterface');
    }

    public function editProfileB()
    {
        return view('ManageUserAccount.FKBursary.ManageUserInterface');
    }

    public function editProfileP()
    {
        return view('ManageUserAccount.PupukAdmin.ManageUserInterface');
    }


}
