<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\Grievance;
use Illuminate\Support\Facades\Auth;

class StaticController extends Controller
{
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
	public function terms_conditions() {
		$data = [];		
        return view('static.terms-conditions', $data);
    }
    public function view_status() {
		$data = [];		
        return view('static.view-status', $data);
    }
	public function register_confirmation() {
		$data = [];		
		if (session('registrationPage') === 'registration')
		{
			Auth::logout();
			return view('static.register-confirmation', $data);
		}
		
		return view('home', $data);
	}
	public function grievance_confirmation($rgt_no = '') {
		$data = [];		
		$data['rgt_no'] = $rgt_no;
        return view('static.grievance-confirmation', $data);
    }
	public function see_grievance(Request $request)
	{
		//echo "<pre>";print_r($request->all());die;
		$validated = $request->validate([
			'registration_no' => 'required',
			'mobile_no' => 'required',
		]);
		
		$grievance = Grievance::where('registration_no', $request->registration_no)->where('mobile_no', $request->mobile_no)->first();

		if(!$grievance) {
			return back()
				->withErrors(['registration_no' => 'No grievance found with the given details.'])
				->withInput();
		}
		
		return redirect()->route('view-grievance', ['id' => $grievance->id]);
	}
}
