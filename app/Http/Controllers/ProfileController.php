<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Device;
use App\Rank;
use App\User;
use Illuminate\Support\Facades\Auth;


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
    
    public function create(Device $devices,Profile $profiles,Rank $ranks)
    {
        return view('profiles.create')
        ->with(['devices' => $devices->get(),'profile' => $profiles->get(),'ranks' => $ranks->get()]);
    }
    
    public function store(Request $request, Profile $profile, Rank $rank)
    {
       
        $icon_image = $request->file('image');
        $fillPath = $icon_image->store('public');
        $profile->path = str_replace('public/', '',$fillPath);
        
        $input_devices = $request->devices_array;  
        $profileDevice = Device::where('id',$input_devices)->first('device_name');  
        $deviceName = $profileDevice->device_name;
        $profile->device = $deviceName;
        
        $input_rank = $request->ranks_array;  
        $profileRank = Rank::where('id',$input_rank)->first('rank_name');  
        $rankName = $profileRank->rank_name;
        $profile->rank = $rankName;
        $input_profile = $request['profile'];
       
        $input_profile += ['user_id' => $request->user()->id]; 

    
    
        $profile->fill($input_profile)->save();
        
       
    
    //attachメソッドを使って中間テーブルにデータを保存
        $profile->devices()->attach($input_devices); 
        $profile->ranks()->attach($input_rank); 
        return redirect('/home');
    }
    
    public function edit(Profile $profile, Device $device, Rank $rank)
    {
            return view('profiles.edit')->with(['profile' => $profile,'devices' => $device->get(), 'ranks'=> $rank->get()]);

    }
    
    public function update(Request $request, Profile $profile , Device $device, Rank $rank)
    {
    
          $profile->name = $request->name;
          $profile->short = $request->profile['short'];
        
        $icon_image = $request->file('image');
        $fillPath = $icon_image->store('public');
        $profile->path = str_replace('public/', '',$fillPath);
          $device = $request->devices_array;
          $rank = $request->ranks_array;
          
          $profile->save();
          $profile->devices()->sync($device); 
          $profile->ranks()->sync($rank); 
            // Profile::where('id', $id)->update($update);
            // $profile = $profile->id;
            // $profile->devices()->sync(request()->devices);
            return redirect('/home');
     
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
    
    public function my()
    {  
      
        $user = Auth::user();
        
        // $user_profile = $user->profile;
        // $user_devices = $user->profile->devices;
    
       return view('profiles.my')
       ->with(['user' => $user]);
        // $user_id = Auth::user()->id;
        // return view('profiles.my')
        // ->with(['user_id' => $user_id]);
    }
    
    public function vue()
    {
        return view('Vue');        
    }
    public function search()
    {
        return view('search');        
    }
}