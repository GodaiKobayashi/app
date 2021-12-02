@extends('layouts.app')

@section('content')
         <a href="/profiles/create">新規</a>

<div class='profiles'>

    {{-- 生徒の数だけ繰り返す --}}
    @foreach($profiles as $profile)
    
        名前:
        <h3 class='name'>
            <a href="{{ route('profile.show',$profile) }}">{{ $profile->name }}</a>
        </h3>  
        自己紹介:
        <h5 class='short'>{{ $profile->short }}</h5>
        機種:
        <h5 class='device'>
        @foreach($profile->devices as $device)   
            {{ $device->device_name }}
        @endforeach
        </h5>
        
        ランク：
        <h5 class='rank'>
            @foreach($profile->ranks as $rank)   
                {{ $rank->rank_name }}
            @endforeach
        </h5>
                
    @endforeach
    
</div>
<div class='paginate'>
            {{ $profiles->links() }}
        </div>
    
    
@endsection