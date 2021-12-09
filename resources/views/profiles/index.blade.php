@extends('layouts.app')

@section('content')
         <a href="/profiles/create">新規</a>

<div class='profiles'>

    {{-- 生徒の数だけ繰り返す --}}
    @foreach($profiles as $profile)
    
        
        <h3 class='name'>
            Display Name:
            <a href="{{ route('profile.show',$profile) }}">{{ $profile->name }}</a>
            
        </h3>  
        
       <p><b>ユーザー：</b>{{Auth::user()->name}}</p>
       
       <p>アイコン</p>
       <p><img src="/storage/{{ $profile->path }}"  width="300" height="200px"></p>
        
       
        <h5 class='short'><b>Twitter ID:</b>{{ $profile->short }}</h5>
        
        <h5 class='device'>
            <b>機種:</b>
        @foreach($profile->devices as $device)   
            {{ $device->device_name }}
        @endforeach
        </h5>
        
       
        <h5 class='rank'>
            <b>ランク：</b>
            @foreach($profile->ranks as $rank)   
                {{ $rank->rank_name }}
            @endforeach
        </h5>
                
        <h5>----------------------</h5>
    @endforeach
    
</div>
<div class='paginate'>
            {{ $profiles->links() }}
        </div>
    
    
@endsection