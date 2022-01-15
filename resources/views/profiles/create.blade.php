@extends('layouts.app')
 <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@section('content')
    <div class="show">
        <div class="title"><h1>ユーザープロフィール作成</h1></div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
        <form action="{{ route('profile.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div>
                <h2>アイコン</h2>
                <input type="file" name="image">
            </div>
            <div>
                <h2>Display Name</h2>
                <input type="text" name="profile[name]" placeholder="ゲーム内の名前" />
            </div>
        
            <div>
                <h2>Twitter ID</h2>
                <input type="text" name="profile[short]" placeholder="TwitterID" />
            </div>
        
            <div>
                <h2>機種</h2>
                @foreach($devices as $device)
                    <label>
                        <input type="radio" value="{{ $device->id }}" name="devices_array[]">
                            {{$device->device_name}}
                        </input>
                    </label>
                @endforeach         
            </div>
            
            <div>
                <h2>ランク</h2>
                @foreach($ranks as $rank)
                    <label>
                        <input type="radio" value="{{ $rank->id }}" name="ranks_array[]">
                            {{$rank->rank_name}}
                        </input>
                    </label>
                @endforeach         
            </div>
            <input type="submit" value="作成">
        </form>
    </div>
@endsection
    