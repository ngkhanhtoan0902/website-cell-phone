<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

	protected $table = 'tags';

    protected $fillable = ['name','slug', 'type', 'meta_title', 'meta_description'];

	protected $pivotTable = 'taggables';

	public function posts()
    {
        return $this->belongsToMany(Post::class, $this->pivotTable, 'tag_id', 'taggable_id');
    }

	public function getPivotTable()
    {
        return $this->pivotTable;
    }
}
