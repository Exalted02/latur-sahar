<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forward_grievance extends Model
{
    use HasFactory;
	protected $table = 'forward_grievances';
	protected $fillable = [
        'greivance_id',
        'forwarded_by',
        'forwarded_to',
        'forward_text',
        'created_at',
    ];
}
