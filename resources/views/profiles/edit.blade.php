<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>開発中</title>

    </head>
    
        <!-- body内だけを表示しています。 -->
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            
         
            <form action="{{ route('profile.update', $profile) }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content__title'>
                    <h2>名前</h2>
                    <input type='text' name='name' value="{{ $profile->name }}">
                </div>
                <div class='content__body'>
                    <h2>自己紹介</h2>
                    <input type='text' name='profile[short]' value="{{ $profile->short }}">
                </div>
                <div>
                    <h2>機種</h2>
                    @foreach($devices as $device)
                    
                     <label>
                    @dd($device->id);
                           <input type="checkbox" value="{{ $device->id }}" name="devices_array[]" @if ($device->id == $profile->devices ) checked @endif>
                           
                               {{$device->device_name}}
                           </input>
                     </label>
                    
                    @endforeach         
                </div>
                
                <input type="submit" value="保存">
                <a href="{{ route('profile.show',$profile) }}">戻る</a>
            </form>
        </div>
    </body>
    
</html>