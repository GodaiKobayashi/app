@extends('layouts.app')
  <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@section('content')
<div class="show">
      
            <div class="title">Profile</div>
            <div>
                <h2>Display Name</h2>
                <p>{{ $profile->name }}</p>
            </div>
            
        
                <h2>アイコン</h2>
                <p><img src="/storage/{{ $profile->path }}" ></p>
            
        
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
        </form>
        <div id="app">
          <!-- コピー対象要素とコピーボタン -->
            <input id="copyTarget" type="text" value="{{$profile->short}}" readonly>
            <button onclick="copyToClipboard()">Copy ID</button>

            <a v-bind:href="twitter">Twitter検索</a>
        </div>
        
    </div>
    <a href="{{ route('profile.index') }}">戻る</a>
     
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script>
    var app = new Vue({
        el: '#app',
        data: {
        twitter: 'https://twitter.com'
        }
    })
    
    
    
    
        function copyToClipboard() {
            // コピー対象をJavaScript上で変数として定義する
            var copyTarget = document.getElementById("copyTarget");

            // コピー対象のテキストを選択する
            copyTarget.select();

            // 選択しているテキストをクリップボードにコピーする
            document.execCommand("Copy");

            // コピーをお知らせする
            alert("twitterID コピー: " + copyTarget.value);
        }
    </script>
        
 @endsection