<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ChangePasswordController extends Controller
{
    public function index()
    {
      $data[] = '';
      return view('admin.change-password.index', $data);
    }
	public function save_data(Request $request)
    {
		//echo $request->input('old_password');
		//echo"<pre>";print_r($request->all());die;
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
		
			//$user = User::where('user_type', 0)->first();
			$user = Auth::user();
			//echo"<pre>";print_r($user);die;
			
			if (!Hash::check($request->input('old_password'), $user->password)) 
			{
				return response()->json([
					'errors' => [
						'old_password' => ['The old password does not match our records.']
					]
				], 422);
			}

			//$user->password = Hash::make($request->input('new_password'));
			//$user->save();
			
			 $user->update([
				'password' => Hash::make($request->new_password)
			]);
			
		
    }
}
