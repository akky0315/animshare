<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Anim;
use Illuminate\Support\Facades\DB;

class AnimController extends Controller
{
    public function get(Profile $profile, Anim $anim, Request $request)
    {
        $input_fk = $request['profile'];
        $anim->profile_id = $input_fk['id'];
        $anim->save();
        
        return redirect("/profiles/" . $profile->id . "/anims/" . $anim->id . "/create/check");
    }
    public function create(Profile $profile)
    {
        return view('anims.create')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);
    }
    public function display(Profile $profile)
    {
        return view('anims.display')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);
    }
    public function edit(Profile $profile)
    {
        return view('anims.edit')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);
    }
    public function check(Profile $profile, Anim $anim)
    {
        return view('anims.check')->with(['profile' => $profile, 'anim' => $anim]);
    }
    public function index3(Profile $profile, Anim $anim, Request $request)
    {
        $num = $request['year_num'];
        $num1 = $request['cule_num'];
            
        $client = new \GuzzleHttp\Client();
        $url = 'https://api.moemoe.tokyo/anime/v1/master/' . $num  . '/' .  $num1 ;
        
        $response = $client->request(
            'GET',
            $url,
        );
        
        $animdatas = json_decode($response->getBody(), true);
        
        return view('anims/index')->with([
            'animdatas' => $animdatas,
            'profile' => $profile,
            'anim' => $anim,
        ]);
    }
    public function insert(Profile $profile, Anim $anim, Request $request)
    {
        $input_anim = $request['anim'];
        $anim->title = $input_anim['title'];
        $anim->save();
        
        return redirect('profiles/' . $profile->id . '/anims/create');
    }
    
}
