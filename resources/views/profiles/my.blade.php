@extends('layouts.app')
<link href="{{ asset('css/show.css') }}" rel="stylesheet">

@section('content')
           <a href="{{ route('profile.edit',$user->profile->id) }}">更新</a>
          <div class="show">
      
            <div class="title">MyProfile</div>
            <div>
                <h2>Display Name</h2>
                <p>{{ $user->profile->name }}</p>
            </div>
            
        
                <h2>アイコン</h2>
                <p><img src="/storage/{{ $user->profile->path }}" ></p>
            
        
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
        </form>
        <div id="app">
          <!-- コピー対象要素とコピーボタン -->
            <input id="copyTarget" type="text" value="{{$user->profile->short}}" readonly>
            <button onclick="copyToClipboard()">Copy ID</button>

            <a v-bind:href="twitter">Twitter検索</a>
        </div>
        
    </div>
    <a href="{{ route('profile.index') }}">戻る</a>
            
           
 @endsection