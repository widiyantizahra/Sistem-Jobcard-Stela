<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobCard; // Ensure you have this model for Job Card
use App\Models\JobCardDetailM;
use App\Models\JobCardM;
use App\Models\Material;
use Illuminate\Support\Facades\Validator;

class JobCardController extends Controller
{
    // Display the list of job cards
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Fetch job cards, filtered by search if provided
        $jobCards = JobCardM::when($search, function($query, $search) {
            return $query->where('no_jobcard', 'like', "%{$search}%")
                         ->orWhere('customer_name', 'like', "%{$search}%");
        })->paginate(10); // Modify pagination as needed

        // Fetch orders (for Orders Overview)
        $orders = []; // Adjust this logic to fetch orders if applicable

        $material = Material::all();

        return view('pages.admin.job_card.index',compact('jobCards','orders','material'));

    }

    // Show the form for creating a new job card
    public function create()
    {
        return view('jobcard.create'); // Create a form view if necessary
    }

    // Store a newly created job card
    public function store(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'no_jobcard' => 'required|string|max:255|unique:jobcard',
            'date' => 'required|date',
            'kurs' => 'required|numeric',
            'customer_name' => 'required|string|max:255',
            'no_po' => 'required|string|max:255',
            'po_date' => 'required|date',
            'po_received' => 'required|date',
            // 'totalbop' => 'required|numeric',
            // 'totalsp' => 'required|numeric',
            // 'totalbp' => 'required|numeric',
            'no_form' => 'required|string|max:255',
            'effective_date' => 'required|date',
            'no_revisi' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create new Job Card
        $jobCard = new JobCardM();
        $jobCard->no_jobcard = $request->no_jobcard;
        $jobCard->date = $request->date;
        $jobCard->kurs = $request->kurs;
        $jobCard->customer_name = $request->customer_name;
        $jobCard->no_po = $request->no_po;
        $jobCard->po_date = $request->po_date;
        $jobCard->po_received = $request->po_received;
        $jobCard->totalbop = $request->totalbop;
        $jobCard->totalsp = $request->totalsp;
        $jobCard->totalbp = $request->totalbp;
        $jobCard->no_form = $request->no_form;
        $jobCard->effective_date = $request->effective_date;
        $jobCard->no_revisi = $request->no_revisi;
        $jobCard->save();

        return redirect()->route('admin.jobcard')->with('success', 'Job Card added successfully!');
    }

    // Show a specific job card
    public function show($id)
    {
        $jobCard = JobCardM::findOrFail($id);

        return view('jobcard.show', compact('jobCard'));
    }

    // Show the form for editing a job card
    public function edit($id)
    {
        $jobCard = JobCardM::findOrFail($id);

        return view('jobcard.edit', compact('jobCard'));
    }

    // Update a job card
    public function update(Request $request, $id)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'no_jobcard' => 'required|string|max:255',
            'date' => 'required|date',
            'kurs' => 'required|numeric',
            'customer_name' => 'required|string|max:255',
            'no_po' => 'required|string|max:255',
            'po_date' => 'required|date',
            'po_received' => 'required|date',
            'totalbop' => 'required|numeric',
            'totalsp' => 'required|numeric',
            'totalbp' => 'required|numeric',
            'no_form' => 'required|string|max:255',
            'effective_date' => 'required|date',
            'no_revisi' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update Job Card
        $jobCard = JobCardM::findOrFail($id);
        $jobCard->no_jobcard = $request->no_jobcard;
        $jobCard->date = $request->date;
        $jobCard->kurs = $request->kurs;
        $jobCard->customer_name = $request->customer_name;
        $jobCard->no_po = $request->no_po;
        $jobCard->po_date = $request->po_date;
        $jobCard->po_received = $request->po_received;
        $jobCard->totalbop = $request->totalbop;
        $jobCard->totalsp = $request->totalsp;
        $jobCard->totalbp = $request->totalbp;
        $jobCard->no_form = $request->no_form;
        $jobCard->effective_date = $request->effective_date;
        $jobCard->no_revisi = $request->no_revisi;
        $jobCard->save();

        return redirect()->route('admin.jobcard')->with('success', 'Job Card updated successfully!');
    }

    // Delete a job card
    public function destroy($id)
    {
        // dd($id);
        $jobCard = JobCardM::findOrFail($id);
        $loop = JobCardDetailM::where('jobcard_id',$id)->get();
        foreach($loop as $l){
            $same = JobCardDetailM::where('jobcard_id',$l->jobcard_id)->value('id');
            $materi = JobCardDetailM::findOrFail($same);
            $materi->delete();
        }
        $jobCard->delete();

        return redirect()->route('admin.jobcard')->with('success', 'Job Card deleted successfully!');
    }
}

