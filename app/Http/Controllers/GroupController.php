<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Group;
use App\Models\Anim;

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
        $profile->g_num = $group->g_count;
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
    public function m_check(Profile $profile, Group $group, Anim $anim)
    {
        $anim = Anim::all();
        
        return view('groups.m_check')->with(['profiles' => $group->getByGroup(), 'm_profile' => $profile, 'anim' => $anim, "group" => $group]);
    }
    public function match(Profile $profile, Group $group)
    {
        $anim = Anim::all();
        $profiles = $group->getByGroup();
        $m_profiles = [];
        $count = 0;
        
        foreach($profiles as $m_profile)
        {
            $m_profiles[$count] = $m_profile->id;
            $count++;
        }
        
        do
        {
            $judge = false;
            $j_count = 0;
            shuffle($m_profiles);
            for($i = 0; $i < $group->g_count; $i++)
            {
                if($m_profiles[$j_count] === $profiles[$j_count]->id)
                {
                    $judge = true;
                    break;
                }
                $j_count++;
            }
        }
        while($judge);
        
        for($i = 0; $i < $group->g_count; $i++)
        {
            if($profile->id === $profiles[$i]->id)
            {
                $to_profile = Profile::all()->where('id', $m_profiles[$i])->first();
            }
        }
        
        return view('groups.match')->with(['profile' => $profile, 'to_profile' => $to_profile, 'anims' => $to_profile->getByProfile()]);   //受け取ったprofileのidを外部キーにもつanimレコードを取得
    }
     public function match2(Profile $profile, Anim $anim, Request $request)
    {
        $profile->group_id = 1;
        $profile->preparate = 0;
        $profile->save();
        
        $input_anims = $request['id'];   //選択したanimデータを取得
        $anim = Anim::where('id', $input_anims)->first();
        $anim->s_count = $anim->s_count + 1;
        $anim->save();
            
        $profile->profileAnims()->attach($input_anims);   //attachメソッドを使って中間テーブルにデータを保存
        
        return redirect('profiles/' . $profile->id . '/anims/' . $input_anims . '/select/complete');
    }
}
