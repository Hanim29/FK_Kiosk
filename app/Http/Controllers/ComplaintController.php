<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentKiosk = User::find(1);
        $complaints = $currentKiosk->complaints;

        return view('ManageComplaint.complaintList', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ManageComplaint.MakeComplaint');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('photos', $filename, 'public');
        }

        // Jangan sentuh lagi
        // dd($request->toArray());
        $complaint = new Complaint();
        $complaint->title = $request->title;
        // $complaint->date = $request->date;
        $complaint->kiosk_number = $request->kiosk_number;
        $complaint->maintainance_type = $request->type_maintenance;
        $complaint->description = $request->description;
        $complaint->status = Complaint::STATUS_PENDING;
        $complaint->image_path = $filename;
        $complaint->user_id = 1; // nnti tukar
        $complaint->save();


        return redirect(route('complaint.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $complaint = Complaint::find($id);
        return view('ManageComplaint.detail', compact('complaint'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $complaint = Complaint::find($id);
        return view('ManageComplaint.edit',compact('complaint'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->storeAs('photos', $filename, 'public');
        }

        // dd($request->toArray());
        $complaint = Complaint::find($id);
        $complaint->title = $request->title;
        // $complaint->date = $request->date;
        $complaint->kiosk_number = $request->kiosk_number;
        $complaint->maintainance_type = $request->type_maintenance;
        $complaint->description = $request->description;
        $complaint->image_path = $filename;
        $complaint->save();
        return redirect(route('complaint.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $complaint = Complaint::find($id);
        $complaint->delete();
        return redirect(route('complaint.index'));
    }
}
