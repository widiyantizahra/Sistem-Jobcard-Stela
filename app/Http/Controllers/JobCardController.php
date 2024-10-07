<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobCardController extends Controller
{
    public function index(){
        return view('pages.admin.job_card.index');
    }
}
