<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>開発中</title>

    </head>
    
    <body>
         <a href="/profiles/create">新規</a>

<div class='profiles'>

    {{-- 生徒の数だけ繰り返す --}}
    @foreach($profiles as $profile)
    
        名前:
        <h3 class='name'>
            <a href="{{ route('profile.show',$profile) }}">{{ $profile->name }}</a>
        </h3>  
        ユーザー番号：
        <h5 class="id">{{$profile->id}}</h5>
        自己紹介:
        <h5 class='short'>{{ $profile->short }}</h5>
       
        
        
        機種:
        <h5 class='device'>
        
        {{-- ある生徒に関連する教科の数だけ繰り返す --}}
        @foreach($profile->devices as $device)   
            {{ $device->device_name }}
        @endforeach
        
        </h5>
                
    @endforeach
    
</div>
<div class='paginate'>
            {{ $profiles->links() }}
        </div>
    </body>
</html>
