<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile_anim extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'anim_id',
        'from_profile_id',
        ];
}
