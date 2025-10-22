<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grievance_type extends Model
{
    use HasFactory;
	protected $table = 'grievances_type';
	protected $fillable = [
        'department',
        'name',
        'status',
    ];
}
