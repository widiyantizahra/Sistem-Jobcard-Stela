<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function pegawai()
    {
        return view('pages.index');
    }
    public function admin()
    {
        return view('pages.admin.index');
    }
}
