<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// 以下を追記することでProfile Modelが扱えるようになる
use App\Profile;


class ProfileController extends Controller
{
  public function add()
  {
    return view('admin.profile.create');
  }
  
  public function index(Request $request)
  {
      $profile = Profile::find($request->user_id);
      return view('admin.profile.index', ['profile' => $profile]);
  }  
  
  
  public function create(Request $request)
  {
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = new Profile;
      $form = $request->all();
      $profile->user_id = $request->user()->id;

      // データベースに保存する
      $profile->fill($form);
      $profile->save();
    
      return view('admin.profile.index', ['profile' => $profile]);
  }
  
  public function edit(Request $request)
  {
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->user_id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
  }
  
  public function update(Request $request)
  {
      // Varidationを行う
      $this->validate($request, Profile::$rules);

      $profile = Profile::find($request->id);
      $profile_form = $request->all();
      $profile->user_id = $request->user()->id;

      // データベースに保存する
      $profile->fill($profile_form);
      $profile->save();
    
      return view('admin.profile.index', ['profile' => $profile]);
  }
}
