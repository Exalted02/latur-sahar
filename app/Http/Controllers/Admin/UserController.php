<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grievance;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_admin()
    {
      $data[] = '';
      $data['users'] = User::where('user_type', '!=', 1)->where('status','!=', 2)->get();
	  $data['departments'] = Department::where('status','!=', 2)->get();
      return view('admin.user.user', $data);
    }
    public function save_user_admin(Request $request)
    {
		//echo $request->post('id'); die;
		// dd($request->all());
      /*$existingStage = User::where('name', $request->post('name'))->where('status', '!=', 2)
        ->when($request->post('id'), function ($query) use ($request) {
            $query->where('id', '!=', $request->post('id'));
        })
        ->first();*/
		$edit_id = $request->post('id'); // edit id
		
		$existingEmail = User::where('id', '!=', $request->post('id'))->where('email', $request->post('email'))->where('status', '!=', 2)->exists();
		
		if($existingEmail)
		{
			return response()->json([
				'success' => false,
				'field' => 'email',
				'message' => 'email already exists.'
			]);
		}
		
		/*if ($existingStage) {
			return response()->json([
				'success' => false,
				'field' => 'name',
				'message' => 'user already exists.'
			]);
		}*/
		
		
		
		
		if($request->post('id')>0)
		{
			$model= User::find($request->post('id'));
			$model->name		=	$request->post('name');
			$model->user_type	=	$request->post('user_type');
			$model->mobile		=	$request->post('mobile');
			$model->email 		=	$request->post('email');
			
			if($request->post('password') !='')
			{
				$model->password 		=	Hash::make($request->post('password'));
			}
			
			$model->department		=	$request->post('department');
			$model->ward_prabhag_no		=	$request->post('ward_prabhag_no');
			$model->post		=	$request->post('post');
			
			$model->updated_at	=	date('Y-m-d');
			$model->save();
		}
		else{
			$model=new User();
			$model->name		=	$request->post('name');
			$model->user_type	=	$request->post('user_type');
			$model->mobile		=	$request->post('mobile');
			$model->email 		=	$request->post('email');
			$model->password 		=	Hash::make($request->post('password'));
			$model->department		=	$request->post('department');
			$model->ward_prabhag_no		=	$request->post('ward_prabhag_no');
			$model->post		=	$request->post('post');
			$model->status		=	1;
			$model->created_at	=	date('Y-m-d');
			$model->save();
		}
		
		return response()->json([
			'success' => true,
			'message' => 'user saved successfully.'
		]);
    }
	public function edit_user_admin(Request $request)
	{
		$user = User::where('id', $request->id)->first();
		$data = array();
		$data['id']  = $user->id ;
		$data['name']  = $user->name ;
		$data['user_type']  = $user->user_type ;
		$data['department']  = $user->department;
		$data['email']  = $user->email ;
		$data['mobile']  = $user->mobile;
		$data['password']  = $user->password;
		$data['ward_prabhag_no']  = $user->ward_prabhag_no;
		$data['post']  = $user->post;
		return $data;
	}
	public function delete_user_admin(Request $request)
	{
		$name = User::where('id', $request->id)->first()->name;
		echo json_encode($name);
	}
    public function delete_user_admin_list(Request $request)
	{
		//$check = check_record_use($request->id, 'product_code');
		$del = User::where('id', $request->id)->update(['status'=>2]);
		$data['result'] ='success';
		echo json_encode($data);
	}
	public function update_status(Request $request)
	{
		$status = User::where('id', $request->id)->first()->status;
		$change_status = $status == 1 ? 0 : 1;
		$update = User::where('id', $request->id)->update(['status'=> $change_status]);
		
		$data['result'] = $change_status;
		echo json_encode($data);
	}
}
