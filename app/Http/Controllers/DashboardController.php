<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grievance;
use App\Models\Grievance_type;
use App\Models\Department;
use App\Models\Greivance_image;
use App\Models\Wardprabhag;
use ZipArchive;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Forward_grievance;
use App\Services\SmsService;

class DashboardController extends Controller
{
    public function home()
    {
		$data = [];
		
        return view('home', $data);
    }
    public function index($tab = '')
    {
		$data = [];
		$today = Carbon::today()->format('Y-m-d');
		$alert_interval = config('custom.ALERT_GRIEVANCE_DURE_PERIOD');
		
		//echo Carbon::now()->subDays(3); die; // three days
		if(auth()->user()->user_type == 1)
		{
			$tot_grievance = Grievance::where('user_id', auth()->user()->id)->where('status', '!=', 4)->count();
			$pending_grievance = Grievance::where('user_id', auth()->user()->id)->whereIn('status', [1,2])->count();
			$solved_grievance = Grievance::where('user_id', auth()->user()->id)->where('status', 3)->count();
			$alert_grievance = Grievance::where('user_id', auth()->user()->id)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays($alert_interval))->count();
			/*$alert_grievance = Grievance::where('user_id', auth()->user()->id)
			->whereIn('status', [1, 2])
			->where('created_at', '<=', Carbon::now()->subMonth())
			->count();*/
			
			if($tab == 1)
			{
				$data['grievances'] = Grievance::with('get_forwarded_grievance')->where('user_id', auth()->user()->id)->where('status', '!=', 4)->get();
			}
			
			if($tab == 2)
			{
				$data['grievances'] = Grievance::with('get_forwarded_grievance')->where('user_id', auth()->user()->id)->whereIn('status', [1,2])->get();
			}
			
			if($tab == 3)
			{
				$data['grievances'] = Grievance::with('get_forwarded_grievance')->where('user_id', auth()->user()->id)->where('status', 3)->get();
			}
			
			if($tab == 4)
			{
				$data['grievances'] = Grievance::with('get_forwarded_grievance')->where('user_id', auth()->user()->id)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays($alert_interval))->get();
				/*$data['grievances'] = Grievance::with('get_forwarded_grievance')->where('user_id', auth()->user()->id)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subMonth())->get();*/
			}
		}
		
		if(auth()->user()->user_type == 2 || auth()->user()->user_type == 3)
		{
			$tot_grievance = Grievance::where('department', auth()->user()->department)->where('status', '!=', 4)->count();
			$pending_grievance = Grievance::where('department', auth()->user()->department)->whereIn('status', [1,2])->count();
			$solved_grievance = Grievance::where('department', auth()->user()->department)->where('status', 3)->count();
			$alert_grievance = Grievance::where('department', auth()->user()->department)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays($alert_interval))->count();
			/*$alert_grievance = Grievance::where('department', auth()->user()->department)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subMonth())->count();*/
			//echo $alert_grievance;die;
			
			if($tab == 1)
			{
				$data['grievances'] = Grievance::where('department', auth()->user()->department)->where('status', '!=', 4)->get();
			}
			
			if($tab == 2)
			{
				$data['grievances'] = Grievance::where('department', auth()->user()->department)->whereIn('status', [1,2])->get();
			}
			
			if($tab == 3)
			{
				$data['grievances'] = Grievance::where('department', auth()->user()->department)->where('status', 3)->get();
			}
			
			if($tab == 4)
			{
				$data['grievances'] = Grievance::where('department', auth()->user()->department)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays($alert_interval))->get();
				/*$data['grievances'] = Grievance::where('department', auth()->user()->department)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subMonth())->get();*/
			}
		}
		
		if(auth()->user()->user_type == 4 || auth()->user()->user_type == 5 || auth()->user()->user_type == 6)
		{
			$tot_grievance = Grievance::where('status', '!=', 4)->count();
			$pending_grievance = Grievance::whereIn('status', [1,2])->count();
			$solved_grievance = Grievance::where('status', 3)->count();
			$alert_grievance = Grievance::whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays($alert_interval))->count();
			
			if($tab == 1)
			{
				$data['grievances'] = Grievance::where('status', '!=', 4)->get();
			}
			
			if($tab == 2)
			{
				$data['grievances'] = Grievance::whereIn('status', [1,2])->get();
			}
			
			if($tab == 3)
			{
				$data['grievances'] = Grievance::where('status', 3)->get();
			}
			
			if($tab == 4)
			{
				$data['grievances'] = Grievance::whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays($alert_interval))->get();
				/*$data['grievances'] = Grievance::where('department', auth()->user()->department)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subMonth())->get();*/
			}
		}
		
		$data['total_geievance'] = $tot_grievance;
		$data['pending_grievance'] = $pending_grievance;
		$data['solved_grievance'] = $solved_grievance;
		$data['alert_grievance'] = $alert_grievance;
		
		
        return view('dashboard', $data);
    }
    public function submit_grievance()
    {
		$data = [];
		$data['departments'] = Department::where('status', 1)->get();
		$data['wardprabhags'] = Wardprabhag::where('status', 1)->get();
		//$data['grievance'] =  array();
        return view('grievance.submit-grievance', $data);
    }
    public function grievance()
    {
		$data = [];
		//$data['grievances'] = Grievance::with('get_department','get_grievance_type','grievance_image')->get();
		//echo "<pre>";print_r($grievances); die;
		return view('grievance.grievance', $data);
    }
	public function get_list_grievance(Request $request)
	{
		$data = [];
		$interval = config('custom.LOAD_MORE_INTERVAL');
		$lower = empty($request->moreload) ? 0 : $request->moreload;
		$upper = empty($request->moreload) ? config('custom.LOAD_MORE_LIST_SHOW') : config('custom.LOAD_MORE_INTERVAL');
		
		if(auth()->user()->user_type == 1)
		{
			$data['grievances'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', auth()->user()->id)->where('status', '!=', 4)->skip($lower)->take($upper)->get();
		}
		elseif(auth()->user()->user_type == 2 || auth()->user()->user_type == 3)
		{
			$data['grievances'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('department', auth()->user()->department)->where('status', 1)->skip($lower)->take($upper)->get();
		}
		else{
			$data['grievances'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('department', auth()->user()->department)->where('status', '!=', 4)->skip($lower)->take($upper)->get();
		}
		
		
		//echo "<pre>";print_r($grievances);die;
		if(auth()->user()->user_type == 1)
		{
			$grievanceCount = Grievance::with('get_department','get_grievance_type','grievance_image')->where('user_id', auth()->user()->id)->where('status', '!=', 4)->count();
		}
		elseif(auth()->user()->user_type == 2 || auth()->user()->user_type == 3){
			$grievanceCount = Grievance::with('get_department','get_grievance_type','grievance_image')->where('department', auth()->user()->department)->where('status', 1)->count();
		}
		else{
			$grievanceCount = Grievance::with('get_department','get_grievance_type','grievance_image')->where('department', auth()->user()->department)->where('status', '!=', 4)->count();
		}
		//echo $grievanceCount; die;
		
		$count  = $request->moreload =='' ? config('custom.LOAD_MORE_LIST_SHOW') : $request->moreload + $interval;
		$remain = $grievanceCount - $count;
		
		$html = view('grievance.grievance-list-data', $data)->render();
		return response()->json([
			'success' => true,
			'html' => $html,
			'loadmore'=> $lower+$upper,
			'lower'=> $lower,
			'upper'=> $upper,
			'remain'=> $remain
		]);
	}
	public function save_grievance(Request $request)
	{
		//echo "<pre>";print_r($request->all()); die;
		//$registration_no = Str::random(7);
		$registration_no = time();
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
		}
		else
		{
			$model = new Grievance();
			$model->user_id = auth()->user()->id;
			$model->registration_no = $registration_no ?? null;
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
			$id = $model->id;
			
			resolve(SmsService::class)->sendTemplate(auth()->user()->mobile, 'grievance_1', [
				'complaint_no' => $registration_no
			]);
		}
		
		$lo_files = $request->file('lo_file');

		if ($lo_files && is_array($lo_files)) {
			// save new files
			foreach ($lo_files as $file) {
				
				$destinationPath = public_path('uploads/greivance_image');
				if (!file_exists($destinationPath)) {
					mkdir($destinationPath, 0777, true);
				}
				
				//$filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
				$filename = uniqid() . '.'. $file->getClientOriginalExtension();
				$file->move($destinationPath, $filename);

				$fileModel = new Greivance_image();
				$fileModel->greivance_id = $id;
				$fileModel->user_id = auth()->user()->id;
				$fileModel->image_type = 1;
				$fileModel->images = $filename;
				//$fileModel->status = 1;
				$fileModel->save();
			}
		}
		//---------------------------
		return response()->json(['msg'=>'Record added successfully', 'registration_no'=> $registration_no]);
		
	}
    public function view_grievance($id='')
    {
		$data = [];
		$grievance_exists = Grievance::where('id', $id)->where('status', '!=', 4)->exists();
		if(!$grievance_exists)
		{
			return view('errors.404');
		}
		
		//$data['grievance'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('id', $id)->first();
		
		$data['grievance'] = Grievance::with([
			'get_department',
			'get_grievance_type',
			'get_ward_prabhag',
			'grievance_image' => function ($query) {
				$query->where('image_type', 1);
			}
		])->where('id', $id)->first();
		
		//echo "<pre>";print_r($grievance);die;
		
		//$data['solved_image'] = ;
		$data['solved_image'] = Greivance_image::where('greivance_id', $id)->where('image_type', 2)->get();
		
		$data['last_solved'] =  Greivance_image::with(['solved_user'])->where('image_type', 2)->where('greivance_id', $id)->orderByDesc('id')->first();
		// dd($data['solved_image']);
		$data['forward_exists'] = Forward_grievance::where('greivance_id', $id)->first();
		//echo "<pre>";print_r($grievance); die;
        return view('grievance.view-grievance', $data);
    }
	public function get_grievance_type(Request $request)
	{
		$department_id = $request->department_id;
		$edit_id = $request->edit_id !='' ? $request->edit_id : '';
		
		$greivance_id = '';
		if($edit_id)
		{
			$greivance_data = Grievance::where('id', $edit_id)->first();
			$greivance_id = $greivance_data->grievance_type;
		}
		
		$greivances = Grievance_type::where('department', $department_id)->get();
		$html = '<select class="form-control" name="grievance_type">';
		$html .= '<option value="">Please select</option>';
		foreach($greivances as $greivance)
		{
			$selected = ($greivance_id == $greivance->id) ? 'selected' : '';
			$html .= '<option value="'. $greivance->id .'" '. $selected .'>'. $greivance->name .'</option>';
		}
		$html .= '</select>';
		return response()->json(['html'=> $html]);
	}
	public function edit_grievance($id='')
	{
		$data = [];
		/*$data['grievance'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('id', $id)->first();*/
		
		$data['grievance'] = Grievance::with([
			'get_department',
			'get_grievance_type',
			'grievance_image' => function ($query) {
				$query->where('image_type', 1);
			}
		])->where('id', $id)->first();
		//echo "<pre>";print_r($grievance); die;
		$data['departments'] = Department::where('status', 1)->get();
		$data['wardprabhags'] = Wardprabhag::where('status', 1)->get();
        return view('grievance.submit-grievance', $data);
	}
	public function delete_grievance_image(Request $request)
	{
		$imageId = $request->imageId;
		$imagename = $request->imagename;
		
		$filePath = public_path('uploads/greivance_image/' . $imagename);
		if (file_exists($filePath)) {
			unlink($filePath);
			Greivance_image::where('id', $imageId)->where('images', $imagename)->delete();
		}
	}
	public function delete_grievance(Request $request)
	{
		$data = [];
		//echo "<pre>";print_r($request->id);die;
		Grievance::where('id', $request->id)->update(['status'=>4]);
		/*$interval = config('custom.LOAD_MORE_INTERVAL');
		$lower = empty($request->moreload) ? 0 : $request->moreload -2;
		$upper = empty($request->moreload) ? config('custom.LOAD_MORE_LIST_SHOW') : config('custom.LOAD_MORE_INTERVAL');
		//echo $lower.' '.$upper;
		$data['grievances'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('status', '!=', 4)->skip($lower)->take($upper)->get();
		//echo "<pre>";print_r($grievances);die;
		$grievanceCount = Grievance::with('get_department','get_grievance_type','grievance_image')->where('status', '!=', 4)->count();
		//echo $grievanceCount; die;
		
		$count  = $request->moreload =='' ? config('custom.LOAD_MORE_LIST_SHOW') : $request->moreload + $interval;
		$remain = $grievanceCount - $count;
		
		$html = view('grievance.grievance-list-data', $data)->render();*/
		return response()->json([
			'success' => true
		]);
		
		
		//return response()->json(['msg'=>'success', 'loadmore'=>$loadmore]);
	}
	public function resubmit_grievance(Request $request)
	{
		$id = $request->id;
		Grievance::where('id', $id)->where('user_id', auth()->user()->id)->update(['status'=>2, 'resubmitted_date'=>date('Y-m-d H:i:s')]);
		
		$get_grievance = Grievance::find($id);
		resolve(SmsService::class)->sendTemplate(auth()->user()->mobile, 'grievance_2', [
			'complaint_no' => $get_grievance->registration_no
		]);
		return response()->json(['msg'=>'success']);
	}
	
	public function downloadFiles($id)
	{
		$images = Greivance_image::where('greivance_id', $id)->get();

		$zipFolder = public_path('uploads/greivance_image/zip');
		$imageFolder = public_path('uploads/greivance_image');

		if (!File::exists($zipFolder)) {
			File::makeDirectory($zipFolder, 0777, true);
		}

		$zipFileName = 'grievance_images_' . $id . '.zip';
		$zipPath = $zipFolder . DIRECTORY_SEPARATOR . $zipFileName;

		$zip = new ZipArchive();
		if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
			foreach ($images as $image) {
				$fileFullPath = $imageFolder . DIRECTORY_SEPARATOR . $image->images;
				if (File::exists($fileFullPath)) {
					$zip->addFile($fileFullPath, basename($image->images));
				}
			}
			$zip->close();
		} else {
			return back()->with('error', 'Unable to create ZIP file.');
		}

		if (File::exists($zipPath)) {
			ob_end_clean(); // prevent output corruption
			return response()->download($zipPath, $zipFileName, [
				'Content-Type' => 'application/zip',
			])->deleteFileAfterSend(true);
		}

		return back()->with('error', 'Failed to create ZIP file.');
	}
	public function save_citizen_rating(Request $request)
	{
		//echo "<pre>";print_r($request->all());die;
		$validated = $request->validate([
			'rating' => 'required',
			'feedback_description' => 'required',
		]);
		
		$model = Grievance::find($request->grievance_id);
		$model->feedback_rating = $request->rating;
		$model->feedback_description = $request->feedback_description;
		$model->save();
		return back()->with(['success' => 'Inserted']);
	}
	public function grievance_update_status(Request $request)
	{
		//echo "<pre>"; print_r($request->all());die;
		$grievance_id = $request->grievance_id;
		$select_status = $request->select_status;
		
		$model = Grievance::find($grievance_id);
		$model->status = $select_status ?? '';
		$model->save();
		
		$id = $grievance_id;
		
		$lo_files = $request->file('lo_file');

		if ($lo_files && is_array($lo_files)) {
			// save new files
			foreach ($lo_files as $file) {
				
				$destinationPath = public_path('uploads/greivance_image');
				if (!file_exists($destinationPath)) {
					mkdir($destinationPath, 0777, true);
				}
				
				$filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
				$file->move($destinationPath, $filename);

				$fileModel = new Greivance_image();
				$fileModel->greivance_id = $id;
				$fileModel->user_id = auth()->user()->id;
				$fileModel->image_type = 2;
				$fileModel->images = $filename;
				//$fileModel->status = 1;
				$fileModel->save();
			}
		}
		
		return response()->json(['msg'=>'Record added successfully']);
	}
	public function report()
	{
		$data = [];
		if(auth()->user()->user_type == 4 || auth()->user()->user_type == 5 || auth()->user()->user_type == 6)
		{
			$data['grievances'] = Grievance::where('status', '!=', 4)->get();
		}else if(auth()->user()->user_type == 2 || auth()->user()->user_type == 3){
			$data['grievances'] = Grievance::where('status', '!=', 4)->where('department', auth()->user()->department)->get();
		}else{
			$data['grievances'] = Grievance::where('status', '!=', 4)->where('user_id', auth()->user()->id)->get();
		}
		$data['wardprabhag'] = Wardprabhag::where('status', '!=', 2)->get();
		$data['department'] = Department::where('status', '!=', 2)->get();
		return view('report', $data);
	}
	public function src_report(Request $request)
	{
	   //echo "<pre>";print_r($request->all()); die;
	    $src_date = $request->date_range_src_ward_prabhag == 'MM/DD/YYYY - MM/DD/YYYY' ? '' : $request->date_range_src_ward_prabhag;
		
		if (
			empty($request->src_department) &&
			empty($request->src_status) &&
			empty($src_date)
		) {
			return back()->withErrors(['Please fill at least one filter field.'])->withInput();
		}

		$data = [];
		$dataArr = Grievance::query()->where('status', '!=', 4);
		
		if($request->src_department)
		{
			$dataArr->where('department', 'like', '%' . $request->src_department . '%');
			
			$ward_data = Grievance::where('department', $request->src_department)->get();
			if($ward_data->count() > 0)
			{
				$data['src_department'] = $request->src_department;
			}
			else{
				$data['src_department'] = '';
			}
		}
		
		if($request->src_status)
		{
			if($request->src_status == 'all')
			{
				$dataArr->where('status', '!=', 4);
			}
			else
			{
				$dataArr->where('status', 'like', '%' . $request->src_status . '%');
			}
			
			$status_data = Grievance::where('status', $request->src_status)->get();
			if($status_data->count() > 0)
			{
				$data['src_status'] = $request->src_status;
			}
			else{
				$data['src_status'] = '';
			}
			
		}
		
		if($request->date_range_src_ward_prabhag && $request->date_range_src_ward_prabhag != 'MM/DD/YYYY - MM/DD/YYYY') 
		{
			// Explode the date range into start and end dates
			$dates = explode(' - ', $request->date_range_src_ward_prabhag);

			// Convert the start date and end date to Y-m-d format
			$start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay()->format('Y-m-d');
			$end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay()->format('Y-m-d');
			//$contactArr->whereBetween('address_since', [$start_date, $end_date]);
			
			$dataArr->whereDate('submitted_date', '>=', $start_date)
			->whereDate('submitted_date', '<=', $end_date);
			
			
			$date_range_data = Grievance::whereDate('submitted_date', '>=', $start_date)->whereDate('submitted_date', '<=', $end_date)->get();
			if($date_range_data->count() > 0)
			{
				$data['date_range_src_ward_prabhag'] = $request->date_range_src_ward_prabhag;
			}
			else{
				$data['date_range_src_ward_prabhag'] = '';
			}
			
			
		}
		
		$data['grievances'] = $dataArr->with('get_department')->get();
		
		$data['wardprabhag'] = Wardprabhag::where('status', '!=', 2)->get();
		$data['department'] = Department::where('status', '!=', 2)->get();
		return view('report', $data);
	}
	public function download_report(Request $request)
	{
		$src_date = $request->download_date_range_src == 'MM/DD/YYYY - MM/DD/YYYY' ? '' : $request->download_date_range_src;
		
		if (
			empty($request->download_department) &&
			empty($request->download_status) && 
			empty($src_date)
		) {
			return back()->withErrors(['Please fill at least one filter field.'])->withInput();
		}
		
		$wardChk= '';
		$statusChk= '';
		$dateRChk= '';
		
		$dataArr = Grievance::query()->where('status', '!=', 4);
		
		if($request->download_department)
		{
			//$grievances = Grievance::where('ward_prabhag', $request->download_ward_prabhag)->where('status', '!=', 4)->get();
			
			$dataArr->where('department', 'like', '%' . $request->download_department . '%');
			
			$ward_data = Grievance::where('department', $request->download_department)->get();
			if($ward_data->count() > 0)
			{
				$wardChk =1;
			}
		}
		//echo $request->download_status; die;
		
		if($request->download_status)
		{
			//$grievances = Grievance::where('status', $request->download_status)->get();
			
			if($request->download_status == 'all')
			{
				$dataArr->where('status', '!=', 4);
				$statusChk = 1;
			}
			else
			{
				$dataArr->where('status', 'like', '%' . $request->download_status . '%');
			}
			
			$status_data = Grievance::where('status', $request->download_status)->get();
			if($status_data->count() > 0)
			{
				$statusChk = 1;
			}
		}
		
		if($request->download_date_range_src)
		{
			// Explode the date range into start and end dates
			$dates = explode(' - ', $request->download_date_range_src);

			// Convert the start date and end date to Y-m-d format
			$start_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[0])->startOfDay()->format('Y-m-d');
			$end_date = \Carbon\Carbon::createFromFormat('m/d/Y', $dates[1])->endOfDay()->format('Y-m-d');
			
			
			//$grievances = Grievance::whereBetween('submitted_date', [$start_date, $end_date])->get();
			
			$dataArr->whereDate('submitted_date', '>=', $start_date)
		    ->whereDate('submitted_date', '<=', $end_date);
			
			$date_range_data = Grievance::whereDate('submitted_date', '>=', $start_date)->whereDate('submitted_date', '<=', $end_date)->get();
			if($date_range_data->count() > 0)
			{
				$dateRChk =1;
			}
			
		}
		
		
		$grievances = $dataArr->get();

		if($grievances->count() == 0)
		{
			return back()->with('downloadempty', 'norecord');
		}
		//echo "<pre>";print_r($grievances);die;
		
		//return view('grievance_report', compact('grievances'));
        $pdf = Pdf::loadView('grievance_report', compact('grievances'))
                  ->setPaper('a4', 'portrait');

        return $pdf->download('grievance_report.pdf');
	}
	public function save_forwarded_to(Request $request)
	{
		$validated = $request->validate([
			'forward_text' => 'required',
		]);
		
		$forwarded_to = auth()->user()->user_type == 3 ? 2 : 3;
		$model = new Forward_grievance();
		$model->greivance_id = $request->grievance_id ?? null;
		$model->forwarded_by = auth()->user()->id ?? null;
		$model->forwarded_to = $forwarded_to ?? null;
		$model->forward_text = $request->forward_text ?? null;
		$model->save();
		return back()->with('forwarded', 'Forwarded');
	}
	public function list_resubmit_status()
	{
		$data = [];
		// $data['resubmit_list'] = Grievance::with('get_forwarded_grievance')->where('department', auth()->user()->department)->where('status', 2)->get();
		
		if(auth()->user()->user_type == 4 || auth()->user()->user_type == 5 || auth()->user()->user_type == 6)
		{
			$data['resubmit_list'] = Grievance::with('get_forwarded_grievance')->where('status', 2)->get();
		}else if(auth()->user()->user_type == 2 || auth()->user()->user_type == 3){
			$data['resubmit_list'] = Grievance::with('get_forwarded_grievance')->where('department', auth()->user()->department)->where('status', 2)->get();
		}else{
			$data['resubmit_list'] = Grievance::with('get_forwarded_grievance')->where('user_id', auth()->user()->id)->where('status', 2)->get();
		}
		return view('resubmit-list', $data);
	}
}
