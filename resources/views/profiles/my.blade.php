@extends('layouts.app')
<link href="{{ asset('css/show.css') }}" rel="stylesheet">

@section('content')
    <div class="show">
        <div class="title">MyProfile <a href="{{ route('profile.edit',$user->profile->id) }}"><h4>編集</h4></a></div>
            <div>
                <h2>Display Name</h2>
                <p>{{ $user->profile->name }}</p>
            </div>
            
                <h2>アイコン</h2>
                <p><img src="{{ $user->profile->path}}" /></p>
            
            <div>
                <h2>Twitter ID</h2>
                <p>{{ $user->profile->short }}</p>
            </div>
            
            <div>
                <h2>機種</h2>
                    @foreach($user->profile->devices as $device)   
                        {{ $device->device_name }}
                    @endforeach
            </div>
            
            <div>
                <h2>ランク</h2>
                    @foreach($user->profile->ranks as $rank)   
                        {{ $rank->rank_name }}
                    @endforeach
            </div>
    </div>
        <p>
            <a href="{{ route('home') }}">戻る</a>
        </p>
 @endsection