<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	use HasFactory;

	const STATUS_ANSWERED = 2;
	const STATUS_NOT_ANSWERED = 1;
	const TYPE_MAIL = 1;
	const TYPE_CALL = 2;
	const TYPE_MAIL_ACADEMY = 3;

	protected $table = 'contacts';
	protected $fillable = [
		'name', 'email', 'content', 'status', 'type', 'info'
	];

	protected $casts = [
        'info' => 'array',
    ];
}
