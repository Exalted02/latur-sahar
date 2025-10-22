<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
		$data = [];
		
        return view('dashboard', $data);
    }
    public function submit_grievance()
    {
		$data = [];
		
        return view('grievance.submit-grievance', $data);
    }
    public function grievance()
    {
		$data = [];
		
        return view('grievance.grievance', $data);
    }
    public function view_grievance()
    {
		$data = [];
		
        return view('grievance.view-grievance', $data);
    }
}
