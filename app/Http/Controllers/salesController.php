<?php

namespace App\Http\Controllers;

use App\Models\salesModel as Sales;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class salesController extends Controller
{
    // show the sale report interface to user
    // query the sale data from db and pass it to the view
    public function index(Request $request) {
        if($request->kioskNum) {
            // Retrieve saleDate and sales data where appID
            $salesData = Sales::where('kioskNum', $request->kioskNum)->select('saleDate', 'totalSales')->get();
            // Transform the data into an associative array with month names as keys and sales as values
            $salesByMonth = [];
            foreach ($salesData as $sale) {
                $monthName = Carbon::parse($sale->saleDate)->format('F'); // Get month name from saleDate
                $salesByMonth[$monthName] = $sale->totalSales; // Assign sales to the corresponding month name
            }
    
            return view("ManageSalesReport.SalesInterface", ["salesByMonth"=>$salesByMonth]);
        }
        // if accessed by participants
        elseif(Auth::user()->account_type == "student"||Auth::user()->account_type == "vendor") {
            $salesData = Sales::where('userID', Auth::user()->id)->select('saleDate', 'totalSales')->get();
            // Transform the data into an associative array with month names as keys and sales as values
            $salesByMonth = [];
            foreach ($salesData as $sale) {
                $monthName = Carbon::parse($sale->saleDate)->format('F'); // Get month name from saleDate
                $salesByMonth[$monthName] = $sale->totalSales; // Assign sales to the corresponding month name
            }
            return view("ManageSalesReport.SalesInterface", ["salesByMonth"=>$salesByMonth]);
        }
        return view("ManageSalesReport.SalesInterface", ["salesByMonth"=>[]]);
    }

    // add new sale report
    public function AddSales(Request $request) {
        $validatedData = $request->validate([
            'userID' => 'required',
            'saleDate' => 'required|date',
            'kioskNum' => 'required|numeric',
            'month' => 'required|numeric',
            'totalSales' => 'required|numeric',
        ]);

        // Find matching user IDs in the kiosk_participant table
        $appID = DB::table('kiosk_participants')
            ->where('user_id', $validatedData['userID'])
            ->pluck('appID')
            ->first();

        // Create a new Sale using the Sales model and save it to the database
        $sale = new Sales();
        $sale->userID = $validatedData['userID'];
        $sale->saleDate = $validatedData['saleDate'];
        $sale->kioskNum = $validatedData['kioskNum'];
        $sale->totalSales = $validatedData['totalSales'];
        $sale->comment = "";
        $sale->appID = $appID;

        // Save the Sale to the database
        $sale->save();


        return redirect()->back()->with('showSucess', true);
    }

    // update the sale data
    public function UpdateSales(Request $request) {
        $validatedData = $request->validate([
            'userID' => 'required',
            'month' => 'required|numeric',
            'totalSales' => 'required|numeric',
        ]);

        $kioskNum = Sales::where('userID', $validatedData['userID'])
                        ->value('kioskNum');
    
        // find the sale data to update
        $sale = Sales::where('userID', $validatedData['userID'])
            ->whereMonth('saleDate', $validatedData['month'])
            ->first();

        if ($sale) {
            // Update the existing sales report
            $sale->kioskNum = $kioskNum;
            $sale->totalSales = $validatedData['totalSales'];
        
            // Save the updated Sale to the database
            $sale->save();
        
            return redirect()->back()->with('showSucess', true);
        } else {
            // If no existing sales report found, return with an error message
            return redirect()->back()->withErrors(['No sales report found for the provided criteria.'])->withInput();
        }
    
    }

    // query DB for the sale data
    public function ViewSales(Request $request){
        // Fetch data based on kioskID and month
        $kioskNum = $request->input('kioskNum');
        $month = $request->input('month');

        // Perform database query to fetch data based on kioskID and month
        $fetchedData = Sales::where('kioskNum', $kioskNum)
                            ->whereMonth('saleDate', $month)
                            ->first();

        if ($fetchedData == null) {
            // If no data is found, return back with an error message
            return redirect()->back()->withErrors(['No data found for the specified criteria.'])->withInput();
        }

        // Pass fetched data to a view for display
        return redirect()->route($request->routeName)->with('fetchedData', $fetchedData);

    }

    // add comment to the sale report
    public function AddComment(Request $request) {
        $comment = $request->input('saleComment');

        // Find the Sale record by saleID
        $sale = Sales::find($request->salesID);
        // Update the comment field
        $sale->comment = $comment;
        $sale->save();
        return redirect()->back()->with('commentSucess', true);
    }


    // delete the sales report
    public function DeleteSales(Request $request)
    {
        // Find the Sale record by saleID
        $sale = Sales::find($request->salesID);
        // Delete the Sale record
        $sale->delete();

        return redirect()->back()->with('deleteSucess', true);
    }
}
