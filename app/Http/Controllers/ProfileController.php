<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Device;
use App\Rank;
use App\User;
use Illuminate\Support\Facades\Auth;
use Storage;


class ProfileController extends Controller
{   
    public function index(Profile $profiles)
    {
        return view('profiles.index')
            ->with(['profiles' => $profiles->getPaginateByLimit(10)]);
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
        $validatedData = $request->validate([
            'profile.name' => 'required|max:10',
            'image' => 'required',
            'profile.short' => 'required|max:20',
            'devices_array' => 'required',
            'ranks_array' => 'required'
        ]);

        $icon_image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/', $icon_image, 'public');
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
        
        $profile->devices()->attach($input_devices); 
        $profile->ranks()->attach($input_rank); 
        
            return redirect('/');
    }
    
    public function edit(Profile $profile, Device $device, Rank $rank)
    {
        return view('profiles.edit')->with(['profile' => $profile,'devices' => $device->get(), 'ranks'=> $rank->get()]);
    }
    
    public function update(Request $request, Profile $profile , Device $device, Rank $rank)
    {
        $validatedData = $request->validate([
            'profile.name' => 'required|max:10',
            'image' => 'required',
            'profile.short' => 'required|max:20',
            'devices_array' => 'required',
            'ranks_array' => 'required'
        ]);

        $profile->name = $request->profile['name'];
        $profile->short = $request->profile['short'];
        
        $icon_image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/', $icon_image, 'public');
        $fillPath = $icon_image->store('public');
        $profile->path = Storage::disk('s3')->url($path);
        $device = $request->devices_array;
        $profileDevice = Device::where('id',$device)->first('device_name');  
        $deviceName = $profileDevice->device_name;
        $profile->device = $deviceName;
        
        $rank = $request->ranks_array;
        $profileRank = Rank::where('id',$rank)->first('rank_name');  
        $rankName = $profileRank->rank_name;
        $profile->rank = $rankName;
          
        $profile->save();
        $profile->devices()->sync($device); 
        $profile->ranks()->sync($rank); 
            return redirect('/');
    }

    public function my()
    {  
        $user = Auth::user();
        return view('profiles.my')
            ->with(['user' => $user]);
    }
    
    public function search()
    {
        return view('search');        
    }
    
    public function how()
    {
        return view('how');
    }
}