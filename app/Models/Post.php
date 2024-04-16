<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Post extends Model
{
	use HasFactory;

	protected $table = 'posts';

	protected $fillable = [
		'title',
		'slug',
		'thumbnail',
		'author_id',
		'meta_description',
		'content',
		'tag',
		'language',
		'featured',
		'status',
		'orders',
		'created_at',
		'author_info',
		'type',
		'extra_info',
		'category_id',
		'special',
		'count_view',
		'related_ids'
	];

	protected $casts = [
		'author_info'   => 'array',
		'extra_info'    => 'array',
		'related_ids'	=> 'array'
	];

	public function toArray()
    {
        $attributes = parent::toArray();
        $attributes['reading_time'] = $this->reading_time;
        return $attributes;
    }

	public function user()
	{
		return $this->belongsTo(User::class, 'author_id', 'id');
	}

	public function category()
	{
		return $this->belongsTo(Category::class)->where('type', Category::TYPE_BLOG);
	}

	public function tags()
	{
		$tag = new Tag();
		return $this->belongsToMany($tag, $tag->getPivotTable(), 'taggable_id', 'tag_id');
	}

    public function getReadingTimeAttribute()
    {
		if(isset($this->attributes['content'])) {
			$content = strip_tags($this->attributes['content']);
			$wpm = 240;
			$words = count(preg_split('/\s+/', $content)); 
			return round( $words/ $wpm ) ;
		}
		return 0;

    }
}
