<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wardprabhag;

class WardprabhagController extends Controller
{
    public function index()
    {
      $data[] = '';
	  //echo 'hello';die;
      $data['Wardprabhags'] = Wardprabhag::where('status','!=', 2)->get();
      return view('admin.ward-prabhag.ward-prabhag', $data);
    }
    public function save_ward_prabhag(Request $request)
    {
		//echo $request->post('id'); die;
		// dd($request->all());
      $existingStage = Wardprabhag::where('name', $request->post('name'))->where('status', '!=', 2)
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
			$model= Wardprabhag::find($request->post('id'));
			$model->name		=	$request->post('name');
			$model->updated_at	=	date('Y-m-d');
			$model->save();
		}
		else{
			$model=new Wardprabhag();
			$model->name		=	$request->post('name');
			$model->status		=	1;
			$model->created_at	=	date('Y-m-d');
			$model->save();
		}
		
		return response()->json([
			'success' => true,
			'message' => 'Wardprabhag saved successfully.'
		]);
    }
	public function edit_ward_prabhag(Request $request)
	{
		$Wardprabhag = Wardprabhag::where('id', $request->id)->first();
		$data = array();
		$data['id']  = $Wardprabhag->id ;
		$data['name']  = $Wardprabhag->name ;
		return $data;
	}
	public function delete_ward_prabhag(Request $request)
	{
		$name = Wardprabhag::where('id', $request->id)->first()->name;
		echo json_encode($name);
	}
    public function delete_wardprabhag_list(Request $request)
	{
		//$check = check_record_use($request->id, 'product_code');
		$del = Wardprabhag::where('id', $request->id)->update(['status'=>2]);
		$data['result'] ='success';
		echo json_encode($data);
	}
	public function update_status(Request $request)
	{
		$status = Wardprabhag::where('id', $request->id)->first()->status;
		$change_status = $status == 1 ? 0 : 1;
		$update = Wardprabhag::where('id', $request->id)->update(['status'=> $change_status]);
		
		$data['result'] = $change_status;
		echo json_encode($data);
	}
}
