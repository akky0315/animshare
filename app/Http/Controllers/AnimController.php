<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Anim;
use Illuminate\Support\Facades\DB;
use App\Models\Profile_anim;

class AnimController extends Controller
{
    public function get(Profile $profile, Anim $anim, Request $request)
    {
        $input_fk = $request['profile'];    //anims.createビューファイル内のnameタグ[profile_id]の値を取得
        $anim->profile_id = $input_fk['id'];   // 取得した値をanimsテーブルのFKに格納
        $anim->save();   //保存し、新たなレコードが作成される
        
        return redirect("/profiles/" . $profile->id . "/anims/" . $anim->id . "/create/check");
    }
    public function create(Profile $profile)
    {
        return view('anims.create')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);   //profileの主キーと一致する外部キーを持つanimレコードを取得
    }
    public function check(Profile $profile, Anim $anim)
    {
        return view('anims.check')->with(['profile' => $profile, 'anim' => $anim]);
    }
    public function index(Profile $profile, Anim $anim, Request $request)
    {
        $num = $request['num'];    //anims.checkビューファイル内のnameタグ[year_num]の値を取得
            
        $client = new \GuzzleHttp\Client();   //Http通信を行うパッケージのclientインスタンスを作成
        $url = 'https://api.moemoe.tokyo/anime/v1/master/' . $num['year']  . '/' .  $num['cule'] ;   //作成されたURLを取得する
        
        $response = $client->request(    //リクエスト送信し返却データを取得
            'GET',
            $url,
        );
        
        $animdatas = json_decode($response->getBody(), true);   //取得したデータをjson形式からPHPに対応した連想配列にデコードする
        
        return view('anims.index')->with([
            'animdatas' => $animdatas,
            'profile' => $profile,
            'anim' => $anim,
        ]);
    }
    public function insert(Profile $profile, Anim $anim, Request $request)
    {
        $input_anim = $request['animdata'];   //anims.indexビューファイル内のnameタグ[anim]の値を取得
        $anim->title = $input_anim;   //取得した値をanimレコードのtitleカラムに格納
        $anim->save();
        
        return redirect('profiles/' . $profile->id . '/anims/create');
    }
    public function display(Profile $profile)
    {
        return view('anims.display')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);
    }
    public function edit(Profile $profile)
    {
        return view('anims.edit')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);
    }
    public function select(Profile $profile)
    {
        return view('anims.select')->with(['profile' => $profile]);
    }
    public function random(Profile $profile)
    {
        $to_profile = Profile::inRandomOrder()->first();
        
        return view('anims.random')->with(['profile' => $profile, 'to_profile' => $to_profile, 'anims' => $to_profile->getByProfile()]);
    }
    public function complete(Profile $profile, Anim $anim, Request $request, Profile_anim $profile_anim)
    {
            $value = $request['judge'];
            $profile_anim->anim_id = $value;
            $profile_anim->from_profile_id = $profile->id;
            $profile_anim->save();
        
        return redirect('profiles/' . $profile->id . '/anims/select/complete');
    }
    public function history(Profile $profile)
    {
        return view('home')->with(['profile' => $profile]);
    }
}
