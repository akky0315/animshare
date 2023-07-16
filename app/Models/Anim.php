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
        return $this->belongsTo(Profile::class);
    }
    public function getByProfile()
    {
        return $this->profile()->get();
    }
    public function profileAnims()
    {
        return $this->belongsToMany(Profile::class);
    }
    public function getByProfileAnims()
    {
        return $this->profileAnims()->get();
    }
}
