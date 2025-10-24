<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordController extends Controller
{
    public function index()
    {
      $data[] = '';
      return view('change-password.index', $data);
    }
	public function save_data(Request $request)
    {
		//echo "<pre>";print_r($request->all());die;
        $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
		], [
			'old_password.required' => 'Please enter your current password.',
			'new_password.required' => 'Please enter a new password.',
			'new_password.min' => 'New password must be at least 8 characters.',
			'new_password.confirmed' => 'New password and confirm password do not match.',
		]);
		
        $user = Auth::user();

        if (! Hash::check($request->old_password, $user->password)) {
			return back()->withInput()->withErrors(['old_password' => 'The old password is incorrect.']);
		}

        $user->password = Hash::make($request->input('new_password'));
        $user->save();
		
		return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
