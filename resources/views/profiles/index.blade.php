@extends('layouts.app')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@section('content')
         
 <h1>[利用者一覧]</h1>
    <div class="container">
        @foreach($profiles as $profile)
            <div class='profiles'>
                <h3>[---------]</h3>
                    <div class="index-header">
                        <div class="image">
                            <img src="/storage/{{ $profile->path }}"  width="300" height="200px">
                        </div>
                            <h3>
                                {{$profile->user->name}}
                            </h3> 
                        
                            <h5>ランク：
                                @foreach($profile->ranks as $rank)   
                                    {{ $rank->rank_name }}
                                @endforeach
                            </h5>
                    </div>
          
                    <div class="index-footer">
                        <a href="{{ route('profile.show',$profile) }}">詳細表示</a>
                    </div>   
                <h1>〇</h1>
           </div>
        @endforeach
    </div>
    
    <div class="back"><a href="{{ route('home') }}">戻る</a></div>
    <div class="index-paginate">
        {{ $profiles->links() }}
    </div>
@endsection