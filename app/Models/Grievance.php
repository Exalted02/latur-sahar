<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    use HasFactory;
	protected $table = 'grievances';
	protected $fillable = [
        'name',
        'mobile_no',
        'ward_prabhag',
        'department',
        'grievance_type',
        'address',
        'pincode',
        'issue_description',
        'gps_location',
        'latitude',
        'longitude',
        'feedback_rating',
        'feedback_description',
        'submitted_date',
        'solve_date',
        'status',
    ];
}
