<div class="card">
    <div class="card-header">MENU</div>
        <div class="card-body">
            <div class="panel panel-default">
                <ul class="nav nav-pills nav-stacked" style="display:block;">
                    <li><i class="fas fa-user-alt"></i> <a href="#">ホーム</a></li>
                    <li><i class="fas fa-user-alt"></i> <a href="{{ route('profile.my') }}">My Profile</a></li>
                    <li><i class="fas fa-user-alt"></i> <a href="{{ route('profile.index') }}">利用者一覧</a></li>
                    <li><i class="fas fa-user-alt"></i> <a href="{{ route('search') }}">検索</a></li>
                </ul>
              </div>
          </div>
      </div>
      
      <div class="profile">
           <div>
                <h2>My Profile</h2>
                    <p><img src="{{ $user->profile->path}}" /></p>
                <h4>User Name</h4>
                    <p>{{ $user->profile->name }}</p>
            </div>
      </div>