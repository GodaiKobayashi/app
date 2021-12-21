  <div class="col-md-2">
      <div class="card">
          <div class="card-header">MENU</div>
          <div class="card-body">
              <div class="panel panel-default">
                  <ul class="nav nav-pills nav-stacked" style="display:block;">
                      <li><i class="fas fa-user-alt"></i> <a href="#">ホーム</a></li>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('profile.show',$user->profile->id) }}">My Profile</a></li>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('profile.index') }}">利用者一覧</a></li>
                      <li><i class="fas fa-user-alt"></i> <a href="{{ route('search') }}">検索</a></li>
                </ul>
              </div>
          </div>
      </div>
      <div class="profile">
           <div>
               <h2>My Profile</h2>
            <p><img src="/storage/{{ $user->profile->path }}"  width="200" height="150px"></p>
            <h4>Display Name</h4>
               @if(collect([$user->profile])->isEmpty())
                <p>No image</p>
                @else
                <p>{{ $user->profile->name }}</p>
                @endif
            </div>
      </div>
    
  </div>