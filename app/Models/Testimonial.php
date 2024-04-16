<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
	use HasFactory;
	protected $table = 'testimonial';
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'linkedln_profile',
		'company',
		'job_title',
		'photo',
		'content',
		'facebook_profile',
		'twitter_profile',
		'status',
		'orders',
		'created_at'
	];
}
