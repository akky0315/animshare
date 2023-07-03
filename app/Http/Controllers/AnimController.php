<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnimRequest;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Anim;
use Illuminate\Support\Facades\DB;
use App\Models\Profile_anim;

class AnimController extends Controller
{
    public function create(Profile $profile)
    {
         $profile_count = Profile::withCount('anims')->where('id', $profile->id)->first();
        return view('anims.create')->with(['profile' => $profile, 'anims' => $profile->getByProfile(), 'profile_count' => $profile_count]);   //profileの主キーと一致する外部キーを持つanimレコードを取得
    }
    public function check(Profile $profile, Anim $anim)
    {
        return view('anims.check')->with(['profile' => $profile, 'anim' => $anim]);
    }
    public function index(Profile $profile, Anim $anim, AnimRequest $request)
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
            $input_fk = $request['profile'];    //anims.createビューファイル内のnameタグ[profile_id]の値を取得
            $input_anim = $request['animdata'];   //anims.indexビューファイル内のnameタグ[anim]の値を取得
            $anim->title = $input_anim;   //取得した値をanimレコードのtitleカラムに格納
            $anim->profile_id = $input_fk['id'];   // 取得した値をanimsテーブルのFKに格納
            
            $anim->save();

            return redirect('profiles/' . $profile->id . '/anims/create');
    }
    
    public function check2(Profile $profile, Anim $anim)
    {
        return view('anims.check2')->with(['profile' => $profile, 'anim' => $anim]);
    }
    public function index2(Profile $profile, Anim $anim, AnimRequest $request)
    {
        $num = $request['num'];    //anims.checkビューファイル内のnameタグ[year_num]の値を取得
            
        $client = new \GuzzleHttp\Client();   //Http通信を行うパッケージのclientインスタンスを作成
        $url = 'https://api.moemoe.tokyo/anime/v1/master/' . $num['year']  . '/' .  $num['cule'] ;   //作成されたURLを取得する
        
        $response = $client->request(    //リクエスト送信し返却データを取得
            'GET',
            $url,
        );
        
        $animdatas = json_decode($response->getBody(), true);   //取得したデータをjson形式からPHPに対応した連想配列にデコードする
        
        return view('anims.index2')->with([
            'animdatas' => $animdatas,
            'profile' => $profile,
            'anim' => $anim,
        ]);
    }
    public function insert2(Profile $profile, Anim $anim, Request $request)
    {
            $input_anim = $request['animdata'];   //anims.indexビューファイル内のnameタグ[anim]の値を取得
            $anim->title = $input_anim;   //取得した値をanimレコードのtitleカラムに格納
            
            $anim->save();

            return redirect('profiles/' . $profile->id . '/anims/edit');
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
        do
        {
            $to_profile = Profile::inRandomOrder()->first();   //ランダムにprofileレコードを取得し、格納
        }
        while ($profile->id === $to_profile->id);   //格納したデータが一致していれば、やり直し
        
        return view('anims.random')->with(['profile' => $profile, 'to_profile' => $to_profile, 'anims' => $to_profile->getByProfile()]);   //受け取ったprofileのidを外部キーにもつanimレコードを取得
    }
    public function random2(Profile $profile, Request $request)
    {
        $input_anims = $request['id'];   //選択したanimデータを取得
            
        $profile->profileAnims()->attach($input_anims);   //attachメソッドを使って中間テーブルにデータを保存
        
        return redirect('profiles/' . $profile->id . '/anims/' . $input_anims . '/select/complete');
    }
    public function complete(Profile $profile, Anim $anim)
    {
        return view('anims.complete')->with(['profile' => $profile, 'anim' => $anim]);
    }
    public function history(Profile $profile)
    {
        return view('anims.history')->with(['anims' => $profile->getByProfileAnims(), 'profile' => $profile]);   //profileの主キーと一致するanim_history内のレコードを取得し、そのanimレコードを表示
    }
}
