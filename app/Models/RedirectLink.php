<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedirectLink extends Model
{
    use HasFactory;

    protected $table = 'redirect_links';

    protected $fillable = ['issue_link','fix_link'];
}
