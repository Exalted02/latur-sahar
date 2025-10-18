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
    
}
