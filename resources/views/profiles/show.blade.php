@extends('layouts.app')

@section('content')
        <a href="{{ route('profile.edit',$profile->id) }}">更新</a>
            <div>
                <h2>Display Name</h2>
                <p>{{ $profile->name }}</p>
            </div>
            
            <div>
                <h2>アイコン</h2>
                <p><img src="/storage/{{ $profile->path }}"  width="300" height="200px"></p>
            </div>
        
            <div>
                <h2>Twitter ID</h2>
                <p>{{ $profile->short }}</p>
            </div>
        
            <div>
                <h2>機種</h2>
                @foreach($profile->devices as $device)   
                    {{ $device->device_name }}
                @endforeach
            </div>
            <div>
                <h2>ランク</h2>
                @foreach($profile->ranks as $rank)   
                    {{ $rank->rank_name }}
                @endforeach
            </div>
         <form method="post" action="{{ route('profile.destroy', $profile) }}">
            @method('DELETE')
            @csrf

            <button class="btn">[削除]</button>
        </form>
        <a href="{{ route('profile.index') }}">戻る</a> 
 @endsection