<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Grievance;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;

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
	public function grievance_tab_list(Request $request)
	{
		$data = [];
		$tab = $request->tab;
		$lang = $request->lang;
		$APP_URL = env('APP_URL');
		
		if(Auth::guard('sanctum')->check()) 
		{
			$user_id = Auth::guard('sanctum')->user()->id;
			if($tab == 1)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->where('status', '!=', 4)->get();
			}
			
			if($tab == 2)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->whereIn('status', [1,2])->get();
			}
			
			if($tab == 3)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->where('status', 3)->get();
			}
			
			if($tab == 4)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays(3))->get();
			}
			
			if ($lang == 'mr') {
				App::setLocale('mr');
			}
			
			if ($lang == 'en') {
				App::setLocale('en');
			}
			
			//echo "<pre>";print_r($grievances); die;
			foreach($grievances as $grievance)
			{
				if($lang == 'mr')
				{
					if($grievance->status==1)
					{
						$status = __('pending');
					}
					
					if($grievance->status==2)
					{
						$status = __('resubmit');
					}
					
					if($grievance->status==3)
					{
						$status = __('solved');
					}
				}
				
				if($lang == 'en')
				{
					if($grievance->status==1)
					{
						$status = __('pending');
					}
					
					if($grievance->status==2)
					{
						$status = __('resubmit');
					}
					
					if($grievance->status==3)
					{
						$status = __('solved');
					}
				}
				
				
				
				$data[] = [
					'id'		=> $grievance->id ?? '',
					'registration_no'	=> $grievance->registration_no ?? '',
					'submitted_date'	=> Carbon::parse($grievance->submitted_date)->format('d/m/Y') ?? '',
					'department'=> $grievance->get_department->name ?? '',
					'image'	=> $grievance->grievance_image[0]->images ? $APP_URL.'/uploads/greivance_image/' .$grievance->grievance_image[0]->images : null,
					'issue_description'	=> substr($grievance->issue_description, 0, 50) ?? '',
					'status'	=>  $status ?? '',
				];
			}
			
			$response = [
					'data' => $data,
					'status' => 200,
					'tab' => $tab,
					'user_id' => $user_id,
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
	public function grievance_view(Request $request)
	{
		$id = $request->id;
		$lang = $request->lang;
		$APP_URL = env('APP_URL');
		$data = [];
		
		if ($lang == 'mr') 
		{
			App::setLocale('mr');
		}
			
		if ($lang == 'en') {
			App::setLocale('en');
		}
		
		
		
		$grievance = Grievance::with('get_department','get_grievance_type','grievance_image')->where('id', $id)->first();
		//echo "<pre>";print_r($grievance);die;
		
		if($lang == 'mr')
		{
			if($grievance->status==1)
			{
				$status = __('pending');
			}
			
			if($grievance->status==2)
			{
				$status = __('resubmit');
			}
			
			if($grievance->status==3)
			{
				$status = __('solved');
			}
		}
		
		if($lang == 'en')
		{
			if($grievance->status==1)
			{
				$status = __('pending');
			}
			
			if($grievance->status==2)
			{
				$status = __('resubmit');
			}
			
			if($grievance->status==3)
			{
				$status = __('solved');
			}
		}
		
		$data['registration_no'] 	= $grievance->registration_no ?? null;
		$data['submitted_date'] 	= Carbon::parse($grievance->submitted_date)->format('d/m/Y') ??  null;
		$data['department'] 		= $grievance->get_department->name ?? null;
		$data['issue_description'] 	= $grievance->issue_description ?? null;
		$data['status'] 	= $status ?? null;
		if(!empty($grievance->grievance_image[0]->images))
		{
			foreach($grievance->grievance_image as $images)
			{
				$data['images'][] = [
					'image' => $APP_URL.'/uploads/greivance_image/' .$images->images
				];
			}
		}
		
		$response = [
				'data' => $data,
				'status' => 200,
			];
			
		return $response;
	}
	
	
}
