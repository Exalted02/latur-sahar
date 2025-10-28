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
	public function grievance_confirmation() {
		$data = [];		
        return view('static.grievance-confirmation', $data);
    }
	public function about_us() {
		$data = [];		
        return view('static.about-us', $data);
    }
	public function services() {
		$data = [];		
        return view('static.services', $data);
    }
	public function contact_us() {
		$data = [];		
        return view('static.contact-us', $data);
    }
	public function faq() {
		$data = [];		
        return view('static.faq', $data);
    }
}
