@extends('layouts.app')
 <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@section('content')
    <div class="show">
        <h1 class="title">編集画面</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        
        <div class="content">
            <form action="{{ route('profile.update', $profile) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>名前</h2>
                    <input type='text' name='profile[name]' value="{{ $profile->name }}">
                </div>
                
                <div>
                    <h2>アイコン</h2>
                    <input type="file" name="image" >
                </div>
                
                <div class='content__body'>
                    <h2>Twitter ID</h2>
                    <input type='text' name='profile[short]' value="{{ $profile->short }}">
                </div>
                
                <div>
                    <h2>機種</h2>
                    @foreach($devices as $device)
                        <label>
                            <input type="radio" value="{{ $device->id }}" name="devices_array[]"{{ $profile->devices->contains($device->id) ? 'checked' : '' }}>
                                {{$device->device_name}}
                            </input>
                        </label>
                    @endforeach         
                </div>
                
                <div>
                    <h2>ランク</h2>
                    @foreach($ranks as $rank)
                        <label>
                            <input type="radio" value="{{ $rank->id }}" name="ranks_array[]"{{ $profile->ranks->contains($rank->id) ? 'checked' : '' }}>
                                {{$rank->rank_name}}
                            </input>
                        </label>
                    @endforeach         
                </div>
                
                <input type="submit" value="保存">
                
            </form>
                <a href="{{ route('home') }}">戻る</a>
        </div>
    </div>
@endsection