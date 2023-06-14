<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function home(Profile $profile)
    {
        return view('home')->with(['profile' => $profile->find(1)]);
    }
    public function information(Profile $profile)
    {
        return view('profiles.information')->with(['profile' => $profile->find(1)]);
    }
    public function edit(Profile $profile)
    {
        return view('profiles.edit')->with(['profile' => $profile]);
    }
    public function update(Request $request, Profile $profile)
    {
        $input_profile = $request['profile'];
        $profile->find(1)->fill($input_profile)->save();
        
        return redirect('/profile');
    }
}