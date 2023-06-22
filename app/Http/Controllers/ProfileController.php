<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;

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
}
