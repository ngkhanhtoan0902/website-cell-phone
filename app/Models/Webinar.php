<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    use HasFactory;
    protected $table = 'webinars';
    protected $fillable = [
        'title', 
        'content', 
        'url', 
        'thumbnail', 
        'format',
        'category_id', 
        'status', 
        'orders', 
        'created_at',
        'special'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class)->where('type', Category::TYPE_WEBINAR_SERIES);
    }
}
