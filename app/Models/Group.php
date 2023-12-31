<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    protected $casts = [
        'm_profiles' => 'array'
    ];
    
    public function profiles()
    {
        return $this->hasMany(Profile::class);
    }
    public function getByGroup()
    {
        return $this->profiles()->get();
        
    }
}
