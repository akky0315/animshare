<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimController;
use App\Http\Controllers\ProfileAnimController;
use App\Http\Controllers\GroupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ProfileController::class)->middleware('auth')->group(function(){
    Route::get('/dashboard', 'welcome2')->name('app_welcome');    //ログイン後画面に遷移
    Route::get('/profiles/create', 'create')->name('profile.create');   //プロフィール作成画面に遷移
    Route::get('/profiles/{profile}/complete', 'complete')->name('profile.complete');   //プロフィール作成完了画面に遷移
    Route::post('/profiles/create', 'store')->name('profile.store');   //profilesテーブルに新たなレコード情報を渡し、作成
    Route::get('/home', 'home')->name('home');   //ホーム画面に遷移
    Route::get('/profiles/{profile}', 'information')->name('profile.information');  //プロフィール情報を確認する画面に遷移
    Route::get('/profiles/{profile}/edit', 'edit2')->name('profile.edit2');   //プロフィール情報を編集する画面に遷移
    Route::put('/profiles/{profile}', 'update2')->name('profile.update2');   //既存するprofilesテーブル内のレコードの内容を変更し、保存
    Route::get('/profiles/{profile}/friend/approval', 'approval');
    Route::post('/profiles/{profile}/friend/approval', 'approval2');
    Route::get('/profiles/{profile}/friend/wait', 'wait');
    Route::get('/profiles/{profile}/friend', 'friend')->name('profile.friend');
    Route::get('/profiles/{profile}/friend/add', 'add')->name('profile.add');
    Route::post('/profiles/{profile}/friend/add', 'add2')->name('profile.add2');
    Route::get('/profiles/{profile}/friend/{to_profile}', 'add3')->name('profile.add3');
    Route::post('/profiles/{profile}/friend/{to_profile}', 'add4')->name('profile.add4');
    Route::delete('/profiles/{profile}/{profile2}', 'delete');
});

Route::controller(AnimController::class)->middleware('auth')->group(function(){
    Route::get('/profiles/{profile}/anims/create', 'create')->name('anim.create');   //アニメ作成画面に遷移
    Route::get('/profiles/{profile}/anims/create/check/select', 'c_select')->name('anim.c_select');
    Route::get('/profiles/{profile}/anims/create/input', 'input')->name('anim.input');
    Route::get('/profiles/{profile}/anims/create/check', 'check')->name('anim.check');   //APIでアニメを検索するための情報を入力する画面に遷移
    Route::post('/profiles/{profile}/anims/create', 'index')->name('anim.index');   //入力されたデータをAPIに渡し、アニメデータを取得
    Route::post('/profiles/{profile}/anims/insert', 'insert')->name('anim.insert');   //animsテーブルに新たなレコードに情報を渡し、作成
    Route::get('/profiles/{profile}/anims/display', 'display')->name('anim.display');    //アニメ情報を確認する画面に遷移
    Route::get('/profiles/{profile}/anims/edit', 'edit')->name('anim.edit');   //アニメ情報を編集する画面に遷移
    Route::get('/profiles/{profile}/anims/edit/create/check/select', 'c_select2')->name('anim.c_select');
    Route::get('/profiles/{profile}/anims/edit/create/input', 'input2')->name('anim.input');
    Route::get('/profiles/{profile}/anims/edit/create/check', 'check2')->name('anim.check2');   //APIでアニメを検索するための情報を入力する画面に遷移
    Route::post('/profiles/{profile}/anims/edit/create', 'index2')->name('anim.index2');   //入力されたデータをAPIに渡し、アニメデータを取得
    Route::post('/profiles/{profile}/anims/edit/insert', 'insert2')->name('anim.insert2');   //既存のanimsテーブル内のレコードにデータを渡し、保存
    Route::get('/profiles/{profile}/anims/select', 'select')->name('anim.select');   //視聴するアニメ情報の取得の仕方を選ぶ画面に遷移
    Route::get('/profiles/{profile}/anims/select/random', 'random')->name('anim.random');   //他のユーザーが選んだアニメ情報を取得し表示する画面に遷移
    Route::post('/profiles/{profile}/anims', 'random2')->name('anim.random2');   //新たにanim_profileレコードを作成してデータを渡し、保存
    Route::get('/profiles/{profile}/anims/{anim}/select/complete', 'complete')->name('anim.complete');   //選んだアニメを表示する画面に遷移
    Route::get('/profiles/{profile}/history', 'history')->name('history');   //選択履歴のデータをanim_profileテーブルから取得し表示する画面に遷移
});

Route::controller(GroupController::class)->middleware('auth')->group(function(){
    Route::get('/profiles/{profile}/groups/create', 'create')->name('group.create');
    Route::get('/profiles/{profile}/groups/{group}/match', 'match')->name('group.match');
    Route::get('/profiles/{profile}/groups/{group}/match/check', 'm_check')->name('group.match');
    Route::get('/profiles/{profile}/groups/{group}', 'host')->name('group.host');
    Route::post('/profiles/{profile}/groups/create', 'store')->name('group.store');
    Route::post('/profiles/{profile}/groups/leave', 'leave')->name('group.leave');
    Route::post('/profiles/{profile}/groups/{group}/preparate', 'preparate')->name('preparate');
    Route::put('/profiles/{profile}/groups/add', 'add')->name('group.add');
    Route::post('/profiles/{profile}/groups', 'match2')->name('group.match2');   //新たにanim_profileレコードを作成してデータを渡し、保存
});

require __DIR__.'/auth.php';
