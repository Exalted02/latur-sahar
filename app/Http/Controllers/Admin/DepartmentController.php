<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
      $data[] = '';
	  //echo 'hello';die;
      $data['departments'] = Department::where('status','!=', 2)->get();
      return view('admin.department.department', $data);
    }
    public function save_department_code(Request $request)
    {
		//echo $request->post('id'); die;
		// dd($request->all());
      $existingStage = Department::where('name', $request->post('name'))->where('status', '!=', 2)
        ->when($request->post('id'), function ($query) use ($request) {
            $query->where('id', '!=', $request->post('id'));
        })
        ->first();
		
		if ($existingStage) {
			return response()->json([
				'success' => false,
				'message' => 'Name already exists.'
			]);
		}
		
		if($request->post('id')>0)
		{
			$model= Department::find($request->post('id'));
			$model->name		=	$request->post('name');
			$model->address		=	$request->post('address');
			$model->updated_at	=	date('Y-m-d');
			$model->save();
		}
		else{
			$model=new Department();
			$model->name		=	$request->post('name');
			$model->address		=	$request->post('address');
			$model->status		=	1;
			$model->created_at	=	date('Y-m-d');
			$model->save();
		}
		
		return response()->json([
			'success' => true,
			'message' => 'Department saved successfully.'
		]);
    }
	public function edit_department_code(Request $request)
	{
		$department = Department::where('id', $request->id)->first();
		$data = array();
		$data['id']  = $department->id ;
		$data['name']  = $department->name ;
		$data['address']  = $department->address ;
		return $data;
	}
	public function delete_department_code(Request $request)
	{
		$name = Department::where('id', $request->id)->first()->name;
		echo json_encode($name);
	}
    public function delete_department_list(Request $request)
	{
		//$check = check_record_use($request->id, 'product_code');
		$del = Department::where('id', $request->id)->update(['status'=>2]);
		$data['result'] ='success';
		echo json_encode($data);
	}
	public function update_status(Request $request)
	{
		$status = Department::where('id', $request->id)->first()->status;
		$change_status = $status == 1 ? 0 : 1;
		$update = Department::where('id', $request->id)->update(['status'=> $change_status]);
		
		$data['result'] = $change_status;
		echo json_encode($data);
	}
}
