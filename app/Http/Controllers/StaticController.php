<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
use App\Models\Grievance;

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
	public function see_grievance(Request $request)
	{
		//echo "<pre>";print_r($request->all());die;
		$validated = $request->validate([
			'registration_number' => 'required',
			'mobile_no' => 'required',
		]);
		
		$grievance  = Grievance::where('registration_no',$request->registration_no)->wheremobile_no $request->mobile_no)->first();
		return redirect('view-status');
	}
		
}
