<?php

namespace App\Http\Controllers;

use App\Models\JobCardM;
use Illuminate\Http\Request;

class GetDataAPI extends Controller
{
    public function index (){
        $jobCards = JobCardM::all();
        return response()->json($jobCards);
    }
}
