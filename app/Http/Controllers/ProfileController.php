<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Device;


class ProfileController extends Controller
{   
    public function index(Profile $profiles)
    {
        return view('profiles.index')
        ->with(['profiles' => $profiles->getPaginateByLimit()]);
    }
    
   public function show(Profile $profile )
   {
       return view('profiles.show')
       ->with(['profile' => $profile ]);
   }
   
   
   
    // public function create(Device $devices)
    // {
    //     return view('profiles.create')
    //     ->with(['devices' => $devices->get()]);
    // }
    
    public function create(Device $devices)
    {
        return view('profiles.create')
        ->with(['devices' => $devices->get()]);
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
    
    public function edit(Profile $profile, Device $device)
    {
            return view('profiles.edit')->with(['profile' => $profile,'devices' => $device->get()]);

    }
    
    public function update(Request $request, Profile $profile , Device $device)
    {
    
          $profile->name = $request->name;
          $profile->short = $request->profile['short'];
          $device = $request->devices_array;
          
          $profile->save();
          $profile->devices()->sync($device); 
            // Profile::where('id', $id)->update($update);
            // $profile = $profile->id;
            // $profile->devices()->sync(request()->devices);
            return redirect('/profiles');
     
        //  $profile->name = $request->name;
        //  $profile->short = $request->short;
        //  $profile->save(name);
        //  $profile->save(short);
        //  return redirect()
        //  ->route('profile.show', $profile);
         
    }
    
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect()
            ->route('profile.index');
    }
    
}