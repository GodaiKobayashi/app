<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>開発中</title>

    </head>
    
    <body>
            <div>
                <h2>名前</h2>
                <p>{{ $profile->name }}</p>
            </div>
        
            <div>
                <h2>自己紹介</h2>
                <p>{{ $profile->short }}</p>
            </div>
        
            <div>
                <h2>機種</h2>
                @foreach($profile->devices as $device)   
                    {{ $device->device_name }}
                @endforeach
            </div>
            
    </body>
    
</html>
        