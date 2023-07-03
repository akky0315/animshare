<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function create(Profile $profile)
    {
        return view('profiles.create');
    }
    public function store(Profile $profile, ProfileRequest $request)
    {
        $input = $request['profile'];   //profiles.createビューファイル内のnameタグ[profile]の値を取得
        $profile->fill($input)->save();   //取得した値をprofilesテーブルのnameに格納し、保存
        return redirect('/profiles/' . $profile->id . '/anims/create');
    }
    public function complete(Profile $profile)
    {
        return view('profiles.complete')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);   //profileの主キーと一致する外部キーを持つanimレコードを取得
    }
    public function home(Profile $profile)
    {
        return view('home')->with(['profile' => $profile]);
    }
    public function information(Profile $profile)
    {
        return view('profiles.information')->with(['profile' => $profile]);
    }
    public function edit(Profile $profile)
    {
        return view('profiles.edit')->with(['profile' => $profile]);
    }
    public function update(Profile $profile, ProfileRequest $request)
    {
        $input = $request['profile'];   //profiles.editビューファイル内のnameタグ[profile]の値を取得
        $profile->fill($input)->save();   ////取得した値をprofilesテーブルのnameに格納し、保存
        
        return redirect('/profiles/' . $profile->id);
    }
    public function friend(Profile $profile)
    {
        return view('profiles.friend')->with(['profile' => $profile, 'friends' => $profile->getByFromProfile()]);
    }
    public function add(Profile $profile)
    {
        return view('profiles.add')->with(['profile' => $profile]);
    }
    public function add2(Profile $profile, Request $request)
    {
        $input_id = $request['id'];
        
        return redirect('profiles/'. $profile->id .'/friend/'. $input_id .'/answer');
    }
    public function add3(Profile $profile, $profile2)
    {
        $to_profile = Profile::find($profile2);
        
        return view('profiles.add2')->with(['profile' => $profile, 'to_profile' => $to_profile]);
    }
    public function add4(Profile $profile, Request $request)
    {
        $input_id = $request['id'];
        $profile->fromProfiles()->attach($input_id);
        
        return redirect('/profiles/'. $profile->id .'/friend');
    }
}
