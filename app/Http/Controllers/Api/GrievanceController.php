<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Grievance;

use Illuminate\Support\Facades\Validator;

class GrievanceController extends Controller
{
	public function grievance_lists()
	{
		if(Auth::guard('sanctum')->check()) 
		{
			$user_id = Auth::guard('sanctum')->user()->id;
			$data = [];
			$data['total_grievance'] = Grievance::where('user_id', $user_id)->count();
			$data['pending_grievance'] = Grievance::where('user_id', $user_id)->whereIn('status', [1,2])->count();
			$data['solved_grievance'] = Grievance::where('user_id', $user_id)->where('status', 3)->count();
			$data['alert_grievance'] = Grievance::where('user_id', $user_id)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays(3))->count();
			
			$response = [
				'data' => $data,
				'status' => 200,
			];			
		}
		else 
		{			
			$response = [
				'status' => 400,
				'message' => 'Please login',
			];
			
		}
		return $response;
	}
	
	
}
