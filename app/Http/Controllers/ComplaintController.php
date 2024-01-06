<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ManageComplaint.complaintList');
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
        // Jangan sentuh lagi
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('ManageComplaint.detail');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('ManageComplaint.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Jangan sentuh lagi
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Jangan sentuh lagi
    }
}
