<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>開発中</title>

    </head>
    
    <body>
        <form action="{{ route('profile.store') }}" method="POST">
            @csrf
            <div>
                <h2>名前</h2>
                <input type="text" name="profile[name]" placeholder="名前" />
            </div>
        
            <div>
                <h2>自己紹介</h2>
                <input type="text" name="profile[short]" placeholder="自己紹介" />
            </div>
        
            <div>
                <h2>機種</h2>
                @foreach($devices as $device)
        
                    <label>
                        <input type="checkbox" value="{{ $device->id }}" name="devices_array[]">
                            {{$device->device_name}}
                        </input>
                    </label>
                    
                @endforeach         
            </div>
            <input type="submit" value="保存"/>
        </form>
    </body>
    
</html>
        