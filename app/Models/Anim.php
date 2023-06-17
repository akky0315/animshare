<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anim extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'profile_id',
        ];
        
    public function profile()
    {
        return $this->belongTo(Profile::class);
    }
}
