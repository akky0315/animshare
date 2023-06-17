<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    public function store(Request $request, Profile $profile)
    {
        $input = $request['profile'];
        $profile->fill($input)->save();
        return redirect('/profiles/' . $profile->id . '/create/complete');
    }
    public function complete(Profile $profile)
    {
        return view('profiles.complete')->with(['profile' => $profile]);
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
    public function update(Request $request, Profile $profile)
    {
        $input_profile = $request['profile'];
        $profile->fill($input_profile)->save();
        
        return redirect('/profiles/' . $profile->id);
    }
}
