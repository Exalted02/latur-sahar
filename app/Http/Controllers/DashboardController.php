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
        return view('grievance.submit-grievance', $data);
    }
    public function grievance()
    {
		$data = [];
		
        return view('grievance.grievance', $data);
    }
	public function save_grievance(Request $request)
	{
		//echo "<pre>";print_r($request->all()); die;
		/*$validatedData = $request->validate([
			'name'   => 'required',
			'mobile_no' => 'required|digits:10',
			'ward_prabhag'   => 'required',
			'department'   => 'required',
			'grievance_type'   => 'required',
			'address'   => 'required',
			'pincode'   => 'required',
			'issue_description'   => 'required',
		]);*/
		
		if($request->post('id') > 1)
		{
			
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
			
			// unlink previous file 
			/*$correctiveFiles = Task_list_corrective_action_file::where('task_list_corrective_actions_id', $id)->where('status',1)->get();
			if($correctiveFiles->isNotEmpty()){
				
				foreach($correctiveFiles as $filemn)
				{
					$f_name = $filemn->file;
					$filePath = public_path('uploads/greivance_image/' . $f_name);
					if (file_exists($filePath)) {
						unlink($filePath);
					}
				}
				
				Greivance_image::where('task_list_corrective_actions_id', $id)->where('status', 1)->delete();
			}*/
			
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
    public function view_grievance()
    {
		$data = [];
		
        return view('grievance.view-grievance', $data);
    }
	public function get_grievance_type(Request $request)
	{
		$department_id = $request->department_id;
		$greivances = Grievance_type::where('department', $department_id)->get();
		$html = '<select class="form-control" name="grievance_type">';
		foreach($greivances as $greivance)
		{
			$html .= '<option value="'. $greivance->id .'">'. $greivance->name .'</option>';
		}
		$html .= '</select>';
		return response()->json(['html'=> $html]);
	}
}
