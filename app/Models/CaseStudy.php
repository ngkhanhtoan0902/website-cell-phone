<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;

    protected $table = 'case_study';

    protected $fillable = [
        'title',
		'slug',
		'thumbnail',
		'meta_description',
		'content',
		'name',
		'job_title',
		'summary',
		'avatar',
		'logo',
		'color_background',
		'status',
		'created_at',
		'special',
		'category_id',
		'language',
		'related_ids',
		'banner' ,
		'preview'
    ];

	protected $casts = [
		'related_ids'	=> 'array',
		'banner' => 'array',
		'preview' => 'array'
	];

	public function toArray()
	{
		$attributes = parent::toArray();
		$attributes['reading_time'] = $this->reading_time;
		return $attributes;
	}

	public function category()
	{
		return $this->belongsTo(Category::class)->where('type', Category::TYPE_CASE_STUDY);
	}

	public function getReadingTimeAttribute()
	{
		if (isset($this->attributes['content'])) {
			$content = strip_tags($this->attributes['content']);
			$wpm = 240;
			$words = count(preg_split('/\s+/', $content));
			return round($words / $wpm);
		}
		return 0;
	}
}
