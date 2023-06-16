<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Anim;

class AnimController extends Controller
{
    public function create(Profile $profile, Anim $anim)
    {
        return view('anims.create')->with(['profile' => $profile]);
    }
    public function check(Profile $profile, Anim $anim)
    {
        return view('anims.check')->with(['profile' => $profile]);
    }
    public function index3(Profile $profile, Anim $anim, Request $request)
    {
        if ($request['year_num']==2023 && $request['cule_num']==2){
        $client = new \GuzzleHttp\Client();
        $url = 'https://api.moemoe.tokyo/anime/v1/master/2023/2';
        
        $response = $client->request(
            'GET',
            $url,
        );
        
        $animdatas = json_decode($response->getBody(), true);
        
        return view('anims/index')->with([
            'animdatas' => $animdatas,
            'profile' => $profile,
        ]);
        }
    }
}
