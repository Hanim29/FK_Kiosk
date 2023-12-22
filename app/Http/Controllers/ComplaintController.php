<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    function add()
    {
        $complaints = Complaint::all();

        return view(
            'ManageComplaint.detail',
            compact('complaints'),
        );
    }
}
