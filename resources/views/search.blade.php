<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー検索</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <a href="{{ route('home') }}">戻る</a>
 <h1>ユーザー検索機能 </h1>
	<h1 id="app">
<input type="text" v-model="keyword">
   <li v-for="user in filteredUsers" :key="user.id">
	    <td>@{{ user.id }}</td>
			<td>@{{ user.name }}</td>
			<td>@{{ user.email }}</td>
	</li>
   <li v-for="profile in filteredProfiles" :key="profile.id">
       
			<td>@{{ profile.name }}</td>
			<td>@{{ profile.short }}</td>
			<td>@{{ profile.device }}</td>
			<td>@{{ profile.rank }}</td>
			<a :href="/profiles/+profile.id">詳細</a>
	</li>
     </h1>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
var app = new Vue({
  el: '#app',
  data: {
  keyword: '',
    users: [],
    profiles: [],
  },
  mounted: function(){
  axios.get('/api/users').then(response => this.users = response.data);
  axios.get('/api/profiles').then(response => this.profiles = response.data);

  },
    computed: {
        filteredUsers: function() {

            var users = [];

                for(var i in this.users) {

                    var user = this.users[i];

                    if(user.name.indexOf(this.keyword) !== -1 ||
                        user.email.indexOf(this.keyword) !== -1) {

                        users.push(user);

                    }
                    

                }

                return users;

        },
        filteredProfiles: function() {

            var profiles = [];

                for(var i in this.profiles) {

                    var profile = this.profiles[i];

                    if(profile.name.indexOf(this.keyword) !== -1 ||
                        profile.short.indexOf(this.keyword) !== -1 ||
                        profile.device.indexOf(this.keyword) !== -1 ||
                        profile.rank.indexOf(this.keyword) !== -1) {

                        profiles.push(profile);

                    }
                    

                }

                return profiles;

        },
            
    }
})
</script>
</body>
  

        
 