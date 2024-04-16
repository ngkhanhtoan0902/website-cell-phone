<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
	use HasFactory;

	protected $table = 'materials';

	protected $fillable = [
		'category_id',
		'title',
		'subtitle',
		'slug',
		'description',
		'content',
		'thumbnail',
		'graphic',
		'url',
		'form_submit',
		'status',
		'related_ids',
		'related_blog_ids',
		'preview',
		'report_embedded'
	];

	protected $casts = [
		'related_ids' => 'array',
		'related_blog_ids' => 'array',
		'preview' => 'array',
	];

	public function category()
	{
		return $this->belongsTo(Category::class)->where('type', Category::TYPE_MATERIAL);
	}
}
