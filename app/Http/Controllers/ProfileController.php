<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;


class ProfileController extends Controller
{   
    public function index(Profile $profiles)
    {
        return view('profiles.index')
        ->with(['profiles' => $profiles->get()]);
    }
    
    public function store(Request $request, Profile $profile)
    {
        $input_profile = $request['profile'];
        $input_devices = $request->devices_array;  //subjects_arrayはnameで設定した配列名
    
    //先にstudentsテーブルにデータを保存
        $profile->fill($input_profile)->save();
    
    //attachメソッドを使って中間テーブルにデータを保存
        $profile->devices()->attach($input_devices); 
        return redirect('/profiles');
    }
}
