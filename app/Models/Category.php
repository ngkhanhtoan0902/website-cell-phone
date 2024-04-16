<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	const TYPE_BLOG = 'blog';
	const TYPE_MATERIAL = 'material';
	const TYPE_CASE_STUDY = 'case_study';
	const TYPE_WEBINAR_SERIES = 'webinar';

	use HasFactory;

	protected $table = 'categories';

	protected $fillable = ['title', 'slug', 'type', 'status', 'meta_title', 'meta_description'];

	public function posts()
	{
		return $this->hasMany(Post::class);
	}

	public function materials()
	{
		return $this->hasMany(Material::class);
	}

	public function caseStudies()
	{
		return $this->hasMany(CaseStudy::class);
	}

	public function webinars()
	{
		return $this->hasMany(Webinar::class);
	}
}
