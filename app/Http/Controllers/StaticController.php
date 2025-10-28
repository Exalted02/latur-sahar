<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;

class StaticController extends Controller
{
    public function view_status() {
		$data = [];		
        return view('static.view-status', $data);
    }
	public function register_confirmation() {
		$data = [];		
        return view('static.register-confirmation', $data);
    }
	public function grievance_confirmation($rgt_no = '') {
		$data = [];		
		$data['rgt_no'] = $rgt_no;
        return view('static.grievance-confirmation', $data);
    }
}
