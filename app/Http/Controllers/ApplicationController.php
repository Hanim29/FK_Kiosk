<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class ApplicationController extends Controller
{
    //display list of application
    public function index()
    {
        $applications = Application::get(); //select * from application database
        return view(
            'ManageKioskApplication.applicationinterface',
            compact('applications')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("ManageKioskApplication.addappinterface");
    }

    //store new data in database
    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'vendorSelect' => 'required',
            'dateRentFrom' => 'required',
            'dateRentTo' =>'required',
            'bizName' => 'required',
            'ssmNo' => 'required',
            'bizType' => 'required',
            'appStatus' => 'required',
        ]);
        //insert data to db
        Application::create(
           $validator -> validate()
        );
    
        // Redirect to the desired page
    return redirect()->route('applications')->with('success', 'Application added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    //edit application
    public function edit($id)
{
    $applications = Application::find($id);
    return view('ManageKioskApplication.updateaddappinterface', compact('applications'));
}

public function update(Request $request, $id)
{
    // Validate the form data
    $validatedData = $request->validate([
        'vendorSelect' => 'required|int',
        'dateRentFrom' => 'required|date',
        'dateRentTo' => 'required|date',
        'bizName' => 'required|string|max:255',
        'ssmNo' => 'required|string|max:255',
        'bizType' => 'required|in:Food,Drinks,Flowers',
    ]);

    // Find the user by ID
    $applications = Application::findOrFail($id);

    // Update the user's attributes
    $applications->vendorSelect = $validatedData['vendorSelect'];
    $applications->dateRentFrom = $validatedData['dateRentFrom'];
    $applications->dateRentTo = $validatedData['dateRentTo'];
    $applications->bizName = $validatedData['bizName'];
    $applications->ssmNo = $validatedData['ssmNo'];
    $applications->bizType = $validatedData['bizType'];

    // Save the updated user
    $applications->save();

    // Redirect the user to their updated profile or any other appropriate page
    return redirect()->route('applications', $applications->id)->with('success', 'Application updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $item = Application::find($id);
        $item->delete();
        return redirect()->route('users')->with('applications', 'Application deleted successfully');
    }
}
