<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Greivance_image extends Model
{
    use HasFactory;
	protected $table = 'greivance_images';
	protected $fillable = [
        'greivance_id',
        'user_id',
        'image_type',
        'images',
    ];
}
