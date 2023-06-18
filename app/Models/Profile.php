<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    public function anims()
    {
        return $this->hasMany(Anim::class);
    }
    public function getByProfile()
    {
        return $this->anims()->get();
    }
}
