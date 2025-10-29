<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Grievance;

class AdminController extends Controller
{
    public function dashboard()
    {
		$data = [];
		
		$tot_grievance = Grievance::count();
		$pending_grievance = Grievance::whereIn('status', [1,2])->count();
		$solved_grievance = Grievance::where('status', 3)->count();
		$alert_grievance = Grievance::whereIn('status', [1,2])->where('created_at', '<=', Carbon::now()->subDays(3))->count();
		
		$data['tot_grievance'] = $tot_grievance;
		$data['pending_grievance'] = $pending_grievance;
		$data['solved_grievance'] = $solved_grievance;
		$data['alert_grievance'] = $alert_grievance;
		
        return view('admin.dashboard', $data);
    }
}
