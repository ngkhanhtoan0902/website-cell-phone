<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateRegistration extends Model
{
    use HasFactory;
    protected $table = 'aff_registration';
    protected $fillable = [
        'name', 'email','phone','birth','linkedin','youtube','website'
    ];

}
