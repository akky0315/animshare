<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'group_id',
    ];
    
    public function anims()
    {
        return $this->hasMany(Anim::class);
    }
    public function getByProfile()
    {
        return $this->anims()->orderBy('created_at', 'desc')->take(3)->get();
    }
    public function profileAnims()
    {
        return $this->belongsToMany(Anim::class);
    }
    public function getByProfileAnims()
    {
        return $this->profileAnims()->get();
    }
    public function fromProfiles()
    {
        return $this->belongsToMany(Profile::class, 'friends', 'to_profile_id', 'from_profile_id')->withPivot('approval');
    }
    public function getByFromProfile()
    {
        return $this->fromProfiles()->orderBy('id', 'asc')->get();
    }
    public function toProfiles()
    {
        return $this->belongsToMany(Profile::class, 'friends', 'from_profile_id', 'to_profile_id')->withPivot('approval');
    }
     public function getByToProfile()
    {
        return $this->toProfiles()->orderBy('id', 'asc')->get();
    }
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
