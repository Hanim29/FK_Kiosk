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
        $applications = Application::all(); //select * from application database
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
    function store(Request $request)
    {
       
        $request-> validate([
            'vendorSelect' => 'required',
            'dateRentFrom' => 'required',
            'dateRentTo' =>'required',
            'bizName' => 'required',
            'ssmNo' => 'required',
            'bizType' => 'required',
            'appStatus' => '',
        ]);

        Application::create($request->all()); 
        //dd($request);
        //insert data to db
        //Application::create( 
        //   $request -> validate()
        //);

        // Redirect to the desired page
        return redirect()->route('applications')->with('success', 'Application added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($appID)
    {
     $applications = Application::findOrFail($appID);

    return view('ManageKioskApplication.viewappinterface', compact('applications'));
    }

    //edit application
    public function edit($appID)
{
    $applications = Application::find($appID);
    return view("ManageKioskApplication.updateappinterface", compact('applications'));
}

public function update(Request $request, $appID)
{
    // Validate the form data
    $validatedData = $request->validate([
        'vendorSelect' => 'required|int',
        'dateRentFrom' => 'required|date',
        'dateRentTo' => 'required|date',
        'bizName' => 'required|string|max:255',
        'ssmNo' => 'required|string|max:255',
        'bizType' => 'required|in:food,drinks,flowers', // Update to lowercase
    ]);

    // Find the application by ID
    $application = Application::findOrFail($appID);

    // Update the application's attributes
    $application->vendorSelect = $validatedData['vendorSelect'];
    $application->dateRentFrom = $validatedData['dateRentFrom'];
    $application->dateRentTo = $validatedData['dateRentTo'];
    $application->bizName = $validatedData['bizName'];
    $application->ssmNo = $validatedData['ssmNo'];
    $application->bizType = $validatedData['bizType'];

    // Save the updated application
    $application->save();

    // Redirect the user to their updated profile or any other appropriate page
    return redirect()->route('applications', $application->appID)->with('success', 'Application updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function delete($appID)
    {
        $item = Application::find($appID);
        $item->delete();
        return redirect()->route('applications')->with('applications', 'Application deleted successfully');
    }


    
    
        public function adminlistapp()
        {
            $applications = Application::all(); //select * from application database
            return view(
                'ManageKioskApplication.adminlistapp',
                compact('applications')
            );
        }
 
    

  //edit application
  public function approve($appID)
  {
      $applications = Application::find($appID);
      return view('ManageKioskApplication.adminapprovalapp', compact('applications'));
  }
  
  public function adminupdate(Request $request, $appID)
  {
      // Validate the form data
      $validatedData = $request->validate([
          'vendorSelect' => 'required|int',
          'dateRentFrom' => 'required|date',
          'dateRentTo' => 'required|date',
          'bizName' => 'required|string|max:255',
          'ssmNo' => 'required|string|max:255',
          'bizType' => 'required|in:food,drinks,flowers',
          'appStatus' => 'required|in:accepted,rejected',
      ]);
  
      // Find the application by ID
      $applications = Application::findOrFail($appID);
  
      // Update the application's attributes
      $applications->appStatus = $validatedData['appStatus'];
      $applications->save();
    
  
      // Redirect the user to their updated profile or any other appropriate page
      return redirect()->route('applications.index')->with('success', 'Application updated successfully');
  }
  
}