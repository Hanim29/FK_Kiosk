<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
        return view('ManageUserAccount.Admin.StaffRegistrationInterface');
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


    //display user list page
    public function userList()
    {
        $users = User::all();

        return view('ManageUserAccount.Admin.AdminManageUserInterface', compact('users'));
    }

    //delete user
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user){
            return redirect()->back()->with('error', 'User record not found.');
        }

        $user->delete();

        return redirect()->back();
    }

    //link to edit page
    public function editUser($id)
    {
        $user = User::find($id);
        return view('ManageUserAccount.Admin.AdminEditUserInterface', compact('user'));
    }

    //update data in database
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'matrix_id' => $request['matrix_id'],
            'phone_num' => $request['phone_num'],
            'ic_number' => $request['ic_number'],
            'account_type' => $request['account_type'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->route('user_list');
    }


    public function addUser()
    {
        return view('ManageUserAccount.Admin.StaffRegistrationInterface');
    }

    public function createUser(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'matrix_id' => $request['matrix_id'],
            'phone_num' => $request['phone_num'],
            'ic_number' => $request['ic_number'],
            'account_type' => $request['account_type'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->route('user_list');
    }

}
