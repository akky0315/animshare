<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function welcome2(User $user, Profile $profile)
    {
        $user = Auth::user();
        $profile = $user->getByUser()->first(); 
        
        //期間設定をしているならHOMEに飛ぶ条件分岐
        if ($profile == NULL)
        {
            return view('app_welcome');
        }
        else 
        {
            return redirect('/home'); 
        }
    }
    public function create(Profile $profile)
    {
        return view('profiles.create');
    }
    public function store(User $user, Profile $profile, ProfileRequest $request)
    {
        $user = Auth::user();
        
        $input = $request['profile'];   //profiles.createビューファイル内のnameタグ[profile]の値を取得
        $profile->fill($input);   //取得した値をprofilesテーブルのnameに格納
        $profile->user_id = $user->id;
        $profile->password = str_pad(rand(0,99999999),8,0, STR_PAD_LEFT);
        $profile->save();
        
        return redirect('/profiles/' . $profile->id . '/anims/create');
    }
    public function complete(Profile $profile)
    {
        return view('profiles.complete')->with(['profile' => $profile, 'anims' => $profile->getByProfile()]);   //profileの主キーと一致する外部キーを持つanimレコードを取得
    }
    public function home(User $user)
    {
        $user = Auth::user();
        $profile = $user->getByUser()->first();
        
        return view('home')->with(['profile' => $profile]);
    }
    public function information(Profile $profile)
    {
        return view('profiles.information')->with(['profile' => $profile]);
    }
    public function edit2(Profile $profile)
    {
        return view('profiles.edit')->with(['profile' => $profile]);
    }
    public function update2(Profile $profile, ProfileRequest $request)
    {
        $input = $request['profile'];   //profiles.editビューファイル内のnameタグ[profile]の値を取得
        $profile->fill($input)->save();   ////取得した値をprofilesテーブルのnameに格納し、保存
        
        return redirect('/profiles/' . $profile->id);
    }
    public function friend(Profile $profile)
    {
        $friends = $profile->getByFromProfile();

        return view('profiles.friend')->with(['profile' => $profile, 'friends' => $friends]);
    }
    public function add(Profile $profile)
    {
        return view('profiles.add')->with(['profile' => $profile]);
    }
    public function add2(Profile $profile, Request $request)
    {
        $input = $request['id'];
        $to_profile = Profile::where('password', $input)->first();
        
        if($to_profile)
        {
            return redirect('profiles/'. $profile->id .'/friend/'. $to_profile->id);
        }
        else
        {
            return view('profiles.add')->with(['profile' => $profile]);
        }
    }
    public function add3(Profile $profile, Profile $to_profile)
    {
        return view('profiles.add2')->with(['profile' => $profile, 'to_profile' => $to_profile]);
    }
    public function add4(Profile $profile, Request $request)
    {
        $input_id = $request['id'];
        $profile->toProfiles()->attach($input_id, ['approval' => '0']);

        return redirect('/profiles/'. $profile->id .'/friend');
    }
    public function delete(Profile $profile, $profile2)
    {
        $profile->fromProfiles()->detach($profile2);
        $profile->toProfiles()->detach($profile2);

        return redirect('/profiles/'. $profile->id .'/friend');
    }
    public function approval(Profile $profile)
    {
        return view('profiles.approval')->with(['profile' => $profile, 'waitees' => $profile->getByFromProfile()]);
    }
    public function approval2(Profile $profile, Request $request)
    {
        $input_id = $request['id'];
        $profile->fromProfiles()->detach($input_id);
        $input_judge = $request['true'];
        $profile->fromProfiles()->attach($input_id, ['approval' => $input_judge]);
        $profile->toProfiles()->attach($input_id, ['approval' => $input_judge]);

        return redirect('/profiles/'. $profile->id .'/friend');
    }
    public function wait(Profile $profile)
    {
        return view('profiles.wait')->with(['profile' => $profile, 'waiters' => $profile->getByToProfile()]);
    }
}
