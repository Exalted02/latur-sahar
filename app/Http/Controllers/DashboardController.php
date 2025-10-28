<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grievance;
use App\Models\Grievance_type;
use App\Models\Department;
use App\Models\Greivance_image;
use ZipArchive;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function home()
    {
		$data = [];
		
        return view('home', $data);
    }
    public function index()
    {
		$data = [];
		$today = Carbon::today()->format('Y-m-d');
		
		$tot_grievance = Grievance::where('user_id', auth()->user()->id)->count();
		$pending_grievance = Grievance::where('user_id', auth()->user()->id)->whereIn('status', [1,2])->count();
		$solved_grievance = Grievance::where('user_id', auth()->user()->id)->where('status', 3)->count();
		
		
		$alert_grievance = Grievance::where('user_id', auth()->user()->id)->whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays(3))->count();
		
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
		$registration_no = Str::random(7);
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
		}
		
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
		
		$data['grievance'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('id', $id)->first();
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
		$data['grievance'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('id', $id)->first();
		//echo "<pre>";print_r($grievance); die;
		$data['departments'] = Department::where('status', 1)->get();
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
		Grievance::where('id', $request->id)->update(['status'=>4]);
		$interval = config('custom.LOAD_MORE_INTERVAL');
		$lower = empty($request->moreload) ? 0 : $request->moreload -2;
		$upper = empty($request->moreload) ? config('custom.LOAD_MORE_LIST_SHOW') : config('custom.LOAD_MORE_INTERVAL');
		//echo $lower.' '.$upper;
		$data['grievances'] = Grievance::with('get_department','get_grievance_type','grievance_image')->where('status', '!=', 4)->skip($lower)->take($upper)->get();
		//echo "<pre>";print_r($grievances);die;
		$grievanceCount = Grievance::with('get_department','get_grievance_type','grievance_image')->where('status', '!=', 4)->count();
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
		
		
		//return response()->json(['msg'=>'success', 'loadmore'=>$loadmore]);
	}
	public function resubmit_grievance(Request $request)
	{
		$id = $request->id;
		Grievance::where('id', $id)->where('user_id', auth()->user()->id)->update(['status'=>2]);
		return response()->json(['msg'=>'success']);
	}
	public function downloadFiles_one($id)
	{
		$images = Greivance_image::where('greivance_id', $id)->get();

		if ($images->isEmpty()) {
			return back()->with('error', 'No files found for this grievance.');
		}

		$zip = new ZipArchive();
		$zipFileName = 'grievance_' . $id . '_images.zip';
		$zipPath = public_path($zipFileName);

		if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
			foreach ($images as $img) {
				$filePath = public_path('uploads/greivance_image/' . $img->images);
				if (File::exists($filePath)) {
					$zip->addFile($filePath, basename($filePath));
				}
			}
			$zip->close();
		}
		
		$headers = [
			'Content-Type' => 'application/octet-stream',
		];

		return response()->download($zipPath, $zipFileName, $headers)->deleteFileAfterSend(true);
	}
	public function downloadFiles_bck_not($id)
	{
		$images = Greivance_image::where('greivance_id', $id)->get();

		if ($images->isEmpty()) {
			return back()->with('error', 'No files found for this grievance.');
		}

		$zip = new ZipArchive;
		$zipFileName = 'grievance_' . $id . '_images.zip';
		$zipPath = storage_path('app/public/' . $zipFileName);

		// Delete if old zip exists
		if (File::exists($zipPath)) {
			File::delete($zipPath);
		}

		if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
			foreach ($images as $img) {
				$filePath = public_path('uploads/greivance_image/' . $img->images);
				if (File::exists($filePath)) {
					$zip->addFile($filePath, basename($filePath));
				}
			}
			$zip->close();
		} else {
			return back()->with('error', 'Could not create ZIP file.');
		}

		// Ensure clean output before sending the file
		if (ob_get_length()) ob_end_clean();

		return response()->download($zipPath)->deleteFileAfterSend(true);
	}
	
	public function downloadFiles($id)
	{
		$images = Greivance_image::where('greivance_id', $id)->get();
		$public_dir = public_path('uploads/greivance_image/zip');
		$file_dir = public_path('uploads/greivance_image');

		// Make sure zip directory exists
		if (!file_exists($public_dir)) {
			mkdir($public_dir, 0777, true);
		}

		$zipFileName = 'grievance_images_' . $id . '.zip';
		$zipPath = $public_dir . DIRECTORY_SEPARATOR . $zipFileName;

		$zip = new ZipArchive();
		if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {

			foreach ($images as $image) {
				$fileFullPath = $file_dir . DIRECTORY_SEPARATOR . $image->images;

				if (file_exists($fileFullPath)) {
					// Add the actual file to the zip with only the filename inside the zip
					$zip->addFile($fileFullPath, basename($image->images));
				}
			}

			$zip->close();
		}

		if (file_exists($zipPath)) {
			return response()->download($zipPath, $zipFileName, [
				'Content-Type' => 'application/octet-stream',
			])->deleteFileAfterSend(true);
		} else {
			return back()->with('error', 'Failed to create ZIP file.');
		}
	}
}
