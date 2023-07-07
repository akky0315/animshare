<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Group;

class GroupController extends Controller
{
    public function host(Profile $profile, Group $group)
    {
        return view('groups.host')->with(['profile' => $profile, 'profiles' => $group->getByGroup()]);
    }
    public function create(Profile $profile)
    {
        return view('groups.create')->with(['profile' => $profile]);
    }
    public function store(Profile $profile, Group $group, Request $request)
    {
        $input = $request['group'];
        $group->fill($input)->save();
        $profile->group_id = $group->id;
        $profile->save();
        
        return redirect('/profiles/'. $profile->id .'/groups/'. $profile->group->id .'/host');
    }
    public function leave(Profile $profile, Request $request)
    {
        $input = $request['profile'];
        $profile->group_id = $input['group_id'];
        $profile->save();
        
        return redirect('/profiles/'. $profile->id .'/anims/select');
    }
}
