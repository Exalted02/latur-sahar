<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grievance;
use App\Models\Grievance_type;
use App\Models\Department;
use App\Models\Greivance_image;

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
		$data['departments'] = Department::where('status', 1)->get();
		//$data['grievance'] =  array();
        return view('grievance.submit-grievance', $data);
    }
    public function grievance()
    {
		$data = [];
		$data['grievances'] = Grievance::with('get_department','get_grievance_type','grievance_image')->get();
		//echo "<pre>";print_r($grievances); die;
		return view('grievance.grievance', $data);
    }
	public function get_list_grievance(Request $request)
	{
		$data = [];
		$interval = config('custom.LOAD_MORE_INTERVAL');
		$lower = empty($request->moreload) ? 0 : $request->moreload;
		$upper = empty($request->moreload) ? config('custom.LOAD_MORE_LIST_SHOW') : config('custom.LOAD_MORE_INTERVAL');
		
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
	}
	public function save_grievance(Request $request)
	{
		//echo "<pre>";print_r($request->all()); die;
		
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
		return response()->json(['msg', 'Record added successfully']);
		
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
		Grievance::where('id', $request->id)->update(['status'=>4]);
		//$loadmore =  $request->moreload - config('custom.LOAD_MORE_INTERVAL');
		$loadmore = '';
		return response()->json(['msg'=>'success', 'loadmore'=>$loadmore]);
	}
}
