<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Department;

class ProfileController extends Controller
{
	
	public function welcome()
    {
		return view('home');
		/*if(Auth::user()){
			
		}else{
			return view('auth.login');
		}*/
    }
    /**
     * Display the user's profile form.
     */
	public function my_account()
	{
		$data = [];
		$data['account'] = User::where('id', auth()->user()->id)->first();
		$data['departments'] = Department::where('status', 1)->get();
		//echo "<pre>";print_r($account);die;
		return view('my-profile.my-profile', $data);
	}
	public function save_account(Request $request)
	{
		//echo "<pre>";print_r($request->all());die;
		$data = [];
		if(auth()->user()->user_type == 1){
			$request->validate([
				'name' => 'required',
				'mobile' => 'required|digits:10|numeric|unique:users,mobile,' . $request->id,
				'email' => 'required|email|unique:users,email,' . $request->id,
			]);
		}else{
			$request->validate([
				'name' => 'required',
				'mobile' => 'required|digits:10|numeric|unique:users,mobile,' . $request->id,
				'email' => 'required|email|unique:users,email,' . $request->id,
				'ward_prabhag_no' => 'required',
				'department' => 'required',
				'post' => 'required',
			]);
		}
		
		$model = User::find($request->id);
		$model->name = $request->name ?? '';
		$model->mobile = $request->mobile ?? '';
		$model->email = $request->email ?? '';
		if(auth()->user()->user_type != 1){
			$model->ward_prabhag_no = $request->ward_prabhag_no ?? '';
			$model->department = $request->department ?? '';
			$model->post = $request->post ?? '';
		}
		$model->save();
		
		$data['account'] = User::where('id', auth()->user()->id)->first();
		return redirect()->back()->with('success', 'Account updated successfully!');
	}
	
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/login');
    }
	public function contact()
    {
		return view('contact');
    }
}
