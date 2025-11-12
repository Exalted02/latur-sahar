<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\Grievance;
use App\Models\Greivance_image;
use App\Models\Department;
use App\Models\Grievance_type;
use App\Models\Wardprabhag;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Log;

class GrievanceController extends Controller
{
	public function grievance_lists()
	{
		if(Auth::guard('sanctum')->check()) 
		{
			$user_id = Auth::guard('sanctum')->user()->id;
			$data = [];
			$data['total_grievance'] = Grievance::where('user_id', $user_id)->where('status', '!=', 4)->count();
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
		$interval = config('custom.GRIEVANCE_LIST_INTERVAL');
		$page = $request->page ?? 1;
      	$offset = ($page - 1) * $interval;
		
		$data = [];
		$tab = $request->tab;
		$lang = $request->lang ?? 'en';
		$APP_URL = env('APP_URL');
		
		if(Auth::guard('sanctum')->check()) 
		{
			$user_id = Auth::guard('sanctum')->user()->id;
			if($tab == 1)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->where('status', '!=', 4)->skip($offset)->take($interval)->get();
			}
			
			if($tab == 2)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->whereIn('status', [1,2])->skip($offset)->take($interval)->get();
			}
			
			if($tab == 3)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->where('status', 3)->skip($offset)->take($interval)->get();
			}
			
			if($tab == 4)
			{
				$grievances = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', $user_id)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays(3))->skip($offset)->take($interval)->get();
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
				
				//------------------------------
				    $s = 0;
					// $imgExist = 0;
					$imageShow = '';
					$grv_img = Greivance_image::where('greivance_id', $grievance->id)->where('image_type', 1)->get();
					$cntImg = $grv_img->count();
					foreach($grv_img as $img)
					{
						$s++;
						
						$fileImgPath = public_path('uploads/greivance_image/' . $img->images);
						if(file_exists($fileImgPath)) 
						{
							$imageShow = $APP_URL.'/uploads/greivance_image/' .$img->images;
							// $imgExist++;
						}
						
						/*if($imgExist == 0 && $cntImg == $s)
						{
							$imageShow =  $APP_URL.'/uploads/img/noimage.png';
						}*/
					}
					if($imageShow == ''){
						$imageShow =  $APP_URL.'/uploads/img/noimage.png';
					}
				//-------------------------------
				
				/*$filePath = public_path('uploads/greivance_image/' . $grievance->grievance_image[0]->images);
				if(file_exists($filePath)) {
					$imageShow = $APP_URL.'/uploads/greivance_image/' .$grievance->grievance_image[0]->images;
				}
				else
				{
					$imageShow =  $APP_URL.'/uploads/img/noimage.png';
				}*/
				
				$data[] = [
					'id'		=> $grievance->id ?? '',
					'registration_no'	=> $grievance->registration_no ?? '',
					'submitted_date'	=> Carbon::parse($grievance->submitted_date)->format('d/m/Y') ?? '',
					'department'=> $grievance->get_department->name ?? '',
					'image'	=> $imageShow,
					// 'issue_description'	=> substr($grievance->issue_description, 0, 50) ?? '',
					'issue_description' => mb_substr($grievance->issue_description ?? '', 0, 50, 'UTF-8'),
					'status'	=>  $status ?? '',
					'grievance_status'	=>  $grievance->status ?? '',
				];
				
				//$grievance->grievance_image[0]->images ? $APP_URL.'/uploads/greivance_image/' .$grievance->grievance_image[0]->images : null,
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
		$id = $request->id; // grievance id
		$lang = $request->lang ?? 'en';
		$APP_URL = env('APP_URL');
		$data = [];
		
		if ($lang == 'mr') 
		{
			App::setLocale('mr');
		}
			
		if ($lang == 'en') {
			App::setLocale('en');
		}
		
		$grievance = Grievance::with([
			'get_department',
			'get_grievance_type',
			'get_ward_prabhag',
			'grievance_image' => function ($query) {
				$query->where('image_type', 1);
			}
		])->where('id', $id)->first();
		//echo "<pre>";print_r($grievance);die;
		
		$authority_images = Greivance_image::where('greivance_id', $id)->where('image_type', 2)->get();
		
		
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
		
		
		
		
		$data['grievance_id'] 	= $grievance->id ?? null;
		$data['grievance_name'] 	= $grievance->name ?? null;
		$data['grievance_mobile'] 	= $grievance->mobile_no ?? null;
		$data['grievance_user_id'] 	= $grievance->user_id ?? null;
		$data['registration_no'] = $grievance->registration_no ?? null;
		$data['submitted_date'] 	= Carbon::parse($grievance->submitted_date)->format('d/m/Y') ??  null;
		$data['department'] 		= $grievance->get_department->name ?? null;
		$data['department_id'] 		= $grievance->department ?? null;
		$data['grievance_type'] 		= $grievance->get_grievance_type->name ?? null;
		$data['grievance_type_id'] 		= $grievance->grievance_type ?? null;
		$data['ward_prabhag'] 		= $grievance->get_ward_prabhag->name ?? null;
		$data['ward_prabhag_id'] 		= $grievance->ward_prabhag ?? null;
		$data['issue_description'] 	= $grievance->issue_description ?? null;
		$data['latitude'] 	= $grievance->latitude ?? null;
		$data['longitude'] 	= $grievance->longitude ?? null;
		$data['feedback_rating'] 	= $grievance->feedback_rating ?? null;
		$data['feedback_description'] 	= $grievance->feedback_description ?? null;
		$data['status'] 	= $status ?? null;
		$data['grievance_status'] 	= $grievance->status ?? null;
		$data['grievance_address'] 	= $grievance->address ?? null;
		$data['grievance_pincode'] 	= $grievance->pincode ?? null;
		
		$data['solvedImages'] = [];
		$imgExistCitizen = 0;
		$k = 0;
		if(!empty($grievance->grievance_image[0]->images))
		{
			$count_citizen_img = $grievance->grievance_image->count();
			foreach($grievance->grievance_image as $images)
			{
				/*$data['citizen_images'][] = [
					'image' => $APP_URL.'/uploads/greivance_image/' .$images->images,
					'uploaded_by_user_id' => $images->user_id,
				];*/
				
				//$data['images'][] = $APP_URL.'/uploads/greivance_image/' .$images->images; //citizen_images
				
				$citizenImageShow = '';
				$k++;
				
				$filePath = public_path('uploads/greivance_image/' . $images->images);
				if(file_exists($filePath)) {
					$citizenImageShow = $APP_URL.'/uploads/greivance_image/' .$images->images;
					$imgExistCitizen++;
					$data['images'][] = $citizenImageShow;
				}
				
				
				if($imgExistCitizen == 0 && $count_citizen_img == $k)
				{
					$citizenImageShow =  $APP_URL.'/uploads/img/noimage.png';
					$data['images'][] = $citizenImageShow;
				}
			}
			
		}
		
		
		$imgExistSolved = 0;
		$m = 0;
		if(!empty($authority_images))
		{
			$count_solved_img = $authority_images->count();
			foreach($authority_images as $images)
			{
				/*$data['authority_images'][] = [
					'image' => $APP_URL.'/uploads/greivance_image/' .$images->images,
					'uploaded_by_user_id' => $images->user_id,
				];*/
				//$data['solvedImages'][] = $APP_URL.'/uploads/greivance_image/' .$images->images; //authority_images
				
				$solvedImageShow = '';
				$m++;
				
				$filePath = public_path('uploads/greivance_image/' . $images->images);
				if(file_exists($filePath)) {
					$solvedImageShow = $APP_URL.'/uploads/greivance_image/' .$images->images;
					$imgExistSolved++;
					$data['solvedImages'][] = $solvedImageShow; 
				}
				
				
				if($imgExistSolved == 0 && $count_solved_img == $m)
				{
					$solvedImageShow =  $APP_URL.'/uploads/img/noimage.png';
					$data['solvedImages'][] = $solvedImageShow; 
				}
				
				//authority_images
			}
		}
		
		$response = [
				'data' => $data,
				'status' => 200,
				'count_img' => $grievance->grievance_image->count(),
			];
			
		return $response;
	}
	public function resubmit_status(Request $request)
	{
		$id = $request->id ; // grievance id
		$lang = $request->lang ?? 'en';
		$APP_URL = env('APP_URL');
		$data = [];
		
		if ($lang == 'mr') 
		{
			App::setLocale('mr');
		}
			
		if ($lang == 'en') {
			App::setLocale('en');
		}
		
		$check_status = Grievance::where('id', $id)->first()->status;
		
		if($check_status == 3)
		{
			Grievance::where('id', $id)->update(['status'=>2]);
			
			$new_status = Grievance::where('id', $id)->first()->status;
			
			$response = [
				'grievance_status' => $new_status ?? null,
				'message' => __('resubmit_successfully'),
				'status' => 200,
			];
		}
		else
		{
			$response = [
				'status' => 400,
				'message' => __('error'),
			];
		}
		
		return $response;
	}
	public function submit_rating(Request $request)
	{
		
		$APP_URL = env('APP_URL');
		$id = $request->id;
		$lang = $request->lang ?? 'en';
		$feedback_rating = $request->feedback_rating;
		$feedback_description = $request->feedback_description;
		
		if ($lang == 'mr') 
		{
			App::setLocale('mr');
		}
			
		if ($lang == 'en') {
			App::setLocale('en');
		}
		
		if(!empty($feedback_rating) && !empty($feedback_description))
		{
			Grievance::where('id', $id)->update(['feedback_rating'=> $feedback_rating, 'feedback_description'=> $feedback_description]);
			
			$grievance = Grievance::where('id', $id)->first();
			
			$response = [
				'grievance_id' => $id ?? null,
				'feedback_rating' => $feedback_rating,
				'feedback_description' => $feedback_description,
				'grievance_status' => $grievance->status,
				'message' => __('feedback_send_successfully'),
				'status' => 200,
			];
		}
		else
		{
			$response = [
				'status' => 400,
				'message' => __('error'),
			];
		}
		
		return $response;
	}
	public function submit_grievance(Request $request)
	{
		//echo "<pre>";print_r($request->all()); die;
		// Log::info('Post values are. '. json_encode($request->all()));
		$lang = $request->currentLang ?? 'en';
		if ($lang == 'mr') 
		{
			App::setLocale('mr');
		}
			
		if ($lang == 'en') {
			App::setLocale('en');
		}
		
		$registration_no = time();
		$model = new Grievance();
		$model->user_id = Auth::guard('sanctum')->user()->id;
		$model->registration_no = $registration_no ?? null;
		$model->name = $request->post('name');
		$model->mobile_no = $request->post('mobile_no');
		$model->ward_prabhag = $request->post('ward_prabhag');
		$model->department = $request->post('department');
		$model->grievance_type = $request->post('grievance_type');
		$model->address = $request->post('address');
		$model->pincode = $request->post('pincode');
		$model->issue_description = $request->post('issue_description');
		$model->latitude = $request->post('latitude');
		$model->longitude = $request->post('longitude');
		$model->submitted_date = date('Y-m-d H:i:s');
		$model->status = 1;
		$model->created_at = date('Y-m-d h:i:s');
		$model->save();
		$id = $model->id;
		
		$lo_files = $request->file('lo_files');
		//echo "<pre>";print_r($lo_files); die;
		if ($lo_files && is_array($lo_files)) {
			// save new files
			foreach ($lo_files as $file) {
				
				$destinationPath = public_path('uploads/greivance_image');
				if (!file_exists($destinationPath)) {
					mkdir($destinationPath, 0777, true);
				}
				
				//$filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
				$filename = uniqid() . '.' .$file->getClientOriginalExtension();
				$file->move($destinationPath, $filename);

				$fileModel = new Greivance_image();
				$fileModel->greivance_id = $id;
				$fileModel->user_id = Auth::guard('sanctum')->user()->id;
				$fileModel->image_type = 1;
				$fileModel->images = $filename;
				//$fileModel->status = 1;
				$fileModel->save();
			}
		}
		
		$confirmation_message =  __('grievance_success_msg1').''. __('grievance_success_msg2_1').' #'.$registration_no.' '. __('grievance_success_msg2_2').''. __('grievance_success_msg3');
		
		$response = [
			'id'  => $id,
			'success_message' =>  __('grievance_submitted_successfully'),
			'confirmation_message' => $confirmation_message,
			'status' => 200,
		];
		return $response;
	}
	public function department_lists()
	{
		$departments = Department::where('status', '!=', 2)->get();
		//echo "<pre>";print_r($departments);die;
		
		$data = [];
		if($departments->count() > 0)
		{
			foreach($departments as $department)
			{
				
				$data[] = [
					'id'  => $department->id,
					'name'  => $department->name,
				];
			}
			
			$response = [
					'data'  => $data,
					'status' => 200,
				];
		}
		else
		{
			$response = [
				'status' => 400,
				'message' => __('no_record_found'),
			];
		}
			
		return $response;
	}
	public function ward_prabhag_lists()
	{
		$wardprabhags = Wardprabhag::where('status', '!=', 2)->get();
		//echo "<pre>";print_r($departments);die;
		
		$data = [];
		
		if($wardprabhags->count() > 0)
		{
			foreach($wardprabhags as $wardprabhag)
			{
				
				$data[] = [
					'id'  => $wardprabhag->id,
					'name'  => $wardprabhag->name,
				];
			}
			
			$response = [
					'data'  => $data,
					'status' => 200,
				];
		}
		else
		{
			$response = [
				'status' => 400,
				'message' => __('no_record_found'),
			];
		}
			
		return $response;
	}
	
	public function grievance_type(Request $request)
	{
		$department_id = $request->department_id ?? '';
		$grievance_types = Grievance_type::where('department', $department_id)->where('status', '!=', 2)->get();
		
		$data = [];
		
		if($grievance_types->count() > 0)
		{
			foreach($grievance_types as $type)
			{
				$data[] = [
					'id'  => $type->id,
					'department'  => $type->department,
					'name'  => $type->name,
				];
				
			}
			
			$response = [
				'data'  => $data,
				'status' => 200,
			];
			
		}
		else
		{
			$response = [
				'status' => 400,
				'message' => __('no_record_found'),
			];
		}
			
		return $response;
	}
	
	public function edit_grievance(Request $request)
	{
		// Log::info('Edit values are. '. json_encode($request->all()));
		$lang = $request->currentLang ?? 'en';
		if ($lang == 'mr') 
		{
			App::setLocale('mr');
		}
			
		if ($lang == 'en') {
			App::setLocale('en');
		}
		if($request->post('id') > 0)
		{
			$model = Grievance::find($request->post('id'));
			$model->name = $request->post('name');
			$model->mobile_no = $request->post('mobile_no');
			$model->ward_prabhag = $request->post('ward_prabhag');
			$model->department = $request->post('department');
			$model->grievance_type = $request->post('grievance_type');
			$model->address = $request->post('address');
			$model->pincode = $request->post('pincode');
			$model->issue_description = $request->post('issue_description');
			$model->gps_location = $request->post('gps_location');
			$model->latitude = $request->post('latitude');
			$model->longitude = $request->post('longitude');
			//$model->feedback_rating = $request->post('feedback_rating');
			$model->feedback_description = $request->post('feedback_description');
			$model->submitted_date = date('Y-m-d H:i:s');
			$model->status = 1;
			$model->created_at = date('Y-m-d h:i:s');
			$model->save();
			$id = $request->post('id');
			
			$lo_files = $request->file('lo_files');
			//echo "<pre>";print_r($lo_files); die;
			if ($lo_files && is_array($lo_files)) {
				// save new files
				foreach ($lo_files as $file) {
					
					$destinationPath = public_path('uploads/greivance_image');
					if (!file_exists($destinationPath)) {
						mkdir($destinationPath, 0777, true);
					}
					
					//$filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
					$filename = uniqid() . '.' . $file->getClientOriginalExtension();
					$file->move($destinationPath, $filename);

					$fileModel = new Greivance_image();
					$fileModel->greivance_id = $id;
					$fileModel->user_id = Auth::guard('sanctum')->user()->id;
					$fileModel->image_type = 1;
					$fileModel->images = $filename;
					//$fileModel->status = 1;
					$fileModel->save();
				}
			}
			
			$response = [
				'success_message'  => __('grievance_updated_successfully'),
				'status' => 200,
			];
		}
		else
		{
			$response = [
				'status' => 400,
				'message' => __('no_record_found'),
			];
		}
		
		return $response;
	}
	public function delete_grievance_list(Request $request)
	{
		$data = [];
		//echo "<pre>";print_r($request->id);die;
		$lang = $request->currentLang ?? 'en';
		if ($lang == 'mr') 
		{
			App::setLocale('mr');
		}
			
		if ($lang == 'en') {
			App::setLocale('en');
		}
		Grievance::where('id', $request->id)->update(['status'=>4]);
		$response = [
			'message'  => __('grievance_deleted_successfully'),
			'status' => 200,
		];
		
		return $response;
	}
	public function delete_grievance_image(Request $request)
	{
		// $imageId = $request->imageId;
		$imagename = $request->imagename;
		
		$filePath = public_path('uploads/greivance_image/' . $imagename);
		if (file_exists($filePath)) {
			unlink($filePath);
			// Greivance_image::where('id', $imageId)->where('images', $imagename)->delete();
			Greivance_image::where('images', $imagename)->delete();
		}
		
		$response = [
			'message'  => __('deleted_successfully'),
			'status' => 200,
		];
		
		return $response;
	}
	
}
