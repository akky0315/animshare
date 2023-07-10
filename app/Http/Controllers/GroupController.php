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
        $group_count = Group::withCount('profiles')->where('id', $profile->group->id)->first();
        
        return view('groups.host')->with(['my_profile' => $profile, 'profiles' => $group->getByGroup(), 'group' => $group, 'count' => $group_count]);
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
        
        return redirect('/profiles/'. $profile->id .'/groups/'. $profile->group->id);
    }
    public function leave(Profile $profile, Request $request)
    {
        $input = $request['profile'];
        $profile->group_id = $input['group_id'];
        $profile->save();
        
        return redirect('/profiles/'. $profile->id .'/home');
    }
    public function preparate(Profile $profile, Group $group, Request $request)
    {
        $input = $request['profile'];
        $input_count = $request['count'];
        $profile->preparate = $input['preparate'];
        $group->g_count = $group->g_count + $input_count;
        $profile->save();
        $group->save();
        
        return redirect('profiles/'. $profile->id .'/groups/'. $profile->group->id);
    }
    public function add(Profile $profile, Group $group, Request $request)
    {
        $input = $request['profile'];
        $group_count = Group::withCount('profiles')->where('id', $input['group_id'])->first();
        $count1 = $group_count['profiles_count'];
        $count2 = $group_count['g_count'];
        
        if($count1 !== $count2)
        {
            $profile->fill($input)->save();
        
            return redirect('/profiles/'. $profile->id .'/groups/'. $profile->group->id);
        }
        else
        {
            return redirect('/profiles/'. $profile->id .'/friend');
        }
    }
}
