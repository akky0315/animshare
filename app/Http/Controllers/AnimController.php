<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimController extends Controller
{
    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $url = 'https://api.moemoe.tokyo/anime/v1/master/2021';
        
        $response = $client->request(
            'GET',
            $url,
        );
        
        $animdatas = json_decode($response->getBody(), true);
        
        return view('anims/index')->with([
            'animdatas' => $animdatas,
        ]);
    }
}
