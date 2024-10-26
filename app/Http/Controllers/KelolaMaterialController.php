<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaMaterialController extends Controller
{
    public function index(){
        return view('pages.pegawai.kmaterial.index');
    }
}
