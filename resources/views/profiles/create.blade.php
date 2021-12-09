<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>開発中</title>

    </head>
    
    
    <body>
        <h1>ユーザープロフィール作成</h1>
        <form action="{{ route('profile.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div>
                <h2>アイコン</h2>
                <input type="file" name="image">
            </div>
            <div>
                <h2>Display Name</h2>
                <input type="text" name="profile[name]" placeholder="ゲーム内の名前" />
            </div>
        
            <div>
                <h2>Twitter ID</h2>
                <input type="text" name="profile[short]" placeholder="TwitterID" />
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
            
            <div>
                <h2>ランク</h2>
                @foreach($ranks as $rank)
                    <label>
                      
                        <input type="radio" value="{{ $rank->id }}" name="ranks_array[]">
                            {{$rank->rank_name}}
                        </input>
                    </label>
                    
                @endforeach         
            </div>
            <input type="submit" value="保存"/>
        </form>
        <a href="{{ route('profile.index') }}">戻る</a>
    </body>
    
</html>
        