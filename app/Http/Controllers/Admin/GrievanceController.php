<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grievance;
use App\Models\Department;

class GrievanceController extends Controller
{
    public function index()
    {
      $data[] = '';
      $data['grievances'] = Grievance::where('status','!=', 2)->get();
	  $data['departments'] = Department::where('status','!=', 2)->get();
      return view('admin.grievance.grievance', $data);
    }
    public function save_grievance(Request $request)
    {
		//echo $request->post('id'); die;
		// dd($request->all());
      $existingStage = Grievance::where('name', $request->post('name'))->where('status', '!=', 2)
        ->when($request->post('id'), function ($query) use ($request) {
            $query->where('id', '!=', $request->post('id'));
        })
        ->first();
		
		if ($existingStage) {
			return response()->json([
				'success' => false,
				'message' => 'Grievance already exists.'
			]);
		}
		
		if($request->post('id')>0)
		{
			$model= Grievance::find($request->post('id'));
			$model->department		=	$request->post('department');
			$model->name		=	$request->post('name');
			$model->updated_at	=	date('Y-m-d');
			$model->save();
		}
		else{
			$model=new Grievance();
			$model->department		=	$request->post('department');
			$model->name		=	$request->post('name');
			$model->status		=	1;
			$model->created_at	=	date('Y-m-d');
			$model->save();
		}
		
		return response()->json([
			'success' => true,
			'message' => 'Grievance saved successfully.'
		]);
    }
	public function edit_grievance(Request $request)
	{
		$grievance = Grievance::where('id', $request->id)->first();
		$data = array();
		$data['id']  = $grievance->id ;
		$data['name']  = $grievance->name ;
		$data['department']  = $grievance->department ;
		return $data;
	}
	public function delete_grievance(Request $request)
	{
		$name = Grievance::where('id', $request->id)->first()->name;
		echo json_encode($name);
	}
    public function delete_grievance_list(Request $request)
	{
		//$check = check_record_use($request->id, 'product_code');
		$del = Grievance::where('id', $request->id)->update(['status'=>2]);
		$data['result'] ='success';
		echo json_encode($data);
	}
	public function update_status(Request $request)
	{
		$status = Grievance::where('id', $request->id)->first()->status;
		$change_status = $status == 1 ? 0 : 1;
		$update = Grievance::where('id', $request->id)->update(['status'=> $change_status]);
		
		$data['result'] = $change_status;
		echo json_encode($data);
	}
}
