<?php

namespace App\Http\Controllers;

use App\Models\JobCardDetailM;
use Illuminate\Http\Request;

class JobcardDetailController extends Controller
{
    public function store(Request $request, $id)
    {
        dd($request->all());

        // Validate incoming request data
        $validatedData = $request->validate([
            'qty' => 'required|integer',
            'description' => 'required|string|max:255',
            'unit_bop' => 'required|numeric',
            'total_bop' => 'required|numeric',
            'unit_sp' => 'required|numeric',
            'total_sp' => 'required|numeric',
            'unit_bp' => 'required|numeric',
            'total_bp' => 'required|numeric',
            'supplier' => 'nullable|string|max:255',
            'remarks' => 'nullable|string|max:255',
        ]);
        // Store the data in the database (assuming you have a JobCardDetail model)
        $jobcard = new JobCardDetailM();
        $jobcard->jobcard_id = $id;
        $jobcard->qty = $request->qty;
        $jobcard->description = $request->description;
        $jobcard->unit_bop = $request->unit_bop;
        $jobcard->total_bop = $request->total_bop;
        $jobcard->unit_sp = $request->unit_sp;
        $jobcard->total_sp = $request->total_sp;
        $jobcard->unit_bp = $request->unit_bp; // Corrected this line
        $jobcard->total_bp = $request->total_bp;
        $jobcard->supplier = $request->supplier;
        $jobcard->remarks = $request->remarks;
        $jobcard->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Job card detail added successfully!');
    }
    
}
