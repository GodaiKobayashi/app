@extends('layouts.app')

@section('content')
        <!--<a href="{{ route('profile.edit',$profile->id) }}">更新</a>-->
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
        <p id="app">
          <!-- コピー対象要素とコピーボタン -->
            <input id="copyTarget" type="text" value="{{$profile->short}}" readonly>
            <button onclick="copyToClipboard()">Copy text</button>

            <a v-bind:href="twitter">ID検索</a>
        </p>
    
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <!-- bodyタグ内の下部に以下を入力する -->
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
            alert("コピーできました！ : " + copyTarget.value);
        }
    </script>
        
 @endsection