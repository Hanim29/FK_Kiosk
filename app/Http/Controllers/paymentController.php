<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\paymentModel as Payment;
use Carbon\Carbon;

class paymentController extends Controller
{
    // show the main page of payment interface
    public function index() {
        // useres that can access the functions of payment controller
        $valid_users = ["student", "vendor", "admin", "fk_bursary"]; 
        $user_account_type = Auth::user()->account_type;
        
        if (in_array($user_account_type, $valid_users)) {
            if ($user_account_type == "student" || $user_account_type == "vendor") {
                $userAppID = DB::table('kiosk_participants')
                    ->where('user_id', Auth::user()->id)
                    ->get()
                    ->first()
                    ->appID;
                $userApplication = Application::where('appID', $userAppID)->first();
                return view("ManageFKKioskPayment.KioskParticipant.PaymentInterface", ["userApplication" => $userApplication]);
            }

            if($user_account_type == "admin" || $user_account_type == "fk_bursary") { 
                $appIDs = Application::distinct()->pluck('appID');
                $currentMonthFirstDay = Carbon::now()->startOfMonth();
                $paymentsRecords = [];

                foreach ($appIDs as $appID) {
                    $result = [
                        'appID' => $appID,
                        'existsInPayments' => false,
                        'latestPaymentID' => null,
                        'paymentStatus' => 'pending', // Default value is 'pending'
                    ];
                
                    $latestPayment = Payment::where('appID', $appID)
                        ->orderBy('payDate', 'desc') // Order by payDate in descending order
                        ->first();
                
                    if ($latestPayment !== null) {
                        $result['existsInPayments'] = true;
                        $result['latestPaymentID'] = $latestPayment->paymentID;
                
                        // Check if the latest payment is made based on payDate comparison
                        $latestPayDate = Carbon::parse($latestPayment->payDate);
                        if ($latestPayDate->greaterThanOrEqualTo($currentMonthFirstDay)) {
                            $result['paymentStatus'] = 'paid';
                        }
                    }
                
                    $paymentsRecords[] = $result;
                }
                return view("ManageFKKioskPayment.KioskParticipant.PaymentInterface", ['payments' => $paymentsRecords]);
            }
        }

        return back();  // return previous page if other user tries to access this page
    }

    // show the add payment form
    public function indexPayment() {
        $userAppID = DB::table('kiosk_participants')
                    ->where('user_id', Auth::user()->id)
                    ->get()
                    ->first()
                    ->appID;
        $userApplication = Application::where('appID', $userAppID)->first();
        return view("ManageFKKioskPayment.KioskParticipant.AddPayInterface", ["userApplication" => $userApplication]);

    }

    // add new payment record to databse
    public function AddPayment(Request $request) {
        // Validation rules for form fields
        $rules = [
            'appID' => 'required',
            'phoneNum' => 'required|numeric',
            'email' => 'required|email',
            'payDate' => 'required|date',
            'kioskNum' => 'required',
            'totalPay' => 'required|numeric',
            'payMethod' => 'required',
        ];
        
        // Validate the form input
        $validatedData = $request->validate($rules);
        $validatedData['appNum'] = $validatedData['appID'];
    
        Payment::create($validatedData);

        return redirect()->back()->with('showSucess', true);

    }

    public function ViewPayment(int $paymentID) {
        $payment = Payment::where('paymentID', $paymentID)->first();
        if($payment) {
            return view("ManageFKKioskPayment.KioskParticipant.ViewPayment", ["paymentRecord" => $payment]);

        }
        return back();
    }

    // show the update payment form
    public function indexUpdate(int $appID) {
        if(Auth::user()->account_type == "student" || Auth::user()->account_type == "vendor") {
            $participantPayment = Payment::where("appID", $appID)->latest("payDate")->first();
            if($participantPayment) {
                return view("ManageFKKioskPayment.KioskParticipant.UpdatePayInterface", ["paymentRecord" => $participantPayment]);

            }
            return redirect(route("payments.create"));
        }

        // redirect back to previous page if admins access update
        return back();
    }

    public function UpdatePayment(Request $request, int $paymentID) {
        // Validation rules for form fields
        $rules = [
            'appID' => 'required',
            'phoneNum' => 'required|numeric',
            'email' => 'required|email',
            'payDate' => 'required|date',
            'kioskNum' => 'required',
            'totalPay' => 'required|numeric',
            'payMethod' => 'required',
        ];
        // Validate the form input
        $validatedData = $request->validate($rules);
        $validatedData['appNum'] = $validatedData['appID'];
       
        $payment = Payment::where('paymentID', $paymentID)->first();
        
        $payment->update($validatedData);

        return redirect()->back()->with('showSucess', true);
    }

    public function DeletePayment(Request $request, $paymentID)
    {
        // Find the payment record by paymentID
        $payment = Payment::find($paymentID);

        if ($payment) {
            // Delete the payment record
            $payment->delete();
            return redirect()->back()->with('showSucess', true);
        }

        return redirect()->back()->with('error', 'Payment record not found.');
    }
}

