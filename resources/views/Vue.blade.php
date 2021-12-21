
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>属性へのバインド</title>
</head>
<body>
  
	<h1 id="app">
	<input type="text" v-model="textInput">
	<p>@{{textInput}}</p>
	<ul>
	<li v-for="(user,index) in users" v-bind:key="index" >
	<td>@{{ user.id }}</td>
			<td>@{{ user.name }}</td>
			<td>@{{ user.email }}</td>
	</li>
</ul>
<ul>
	<li v-for="(comment,index) in comments" v-bind:key="index">@{{ comment.comment}}</li>
</ul>

<p><input v-model="tweet"></p>
<button @click="postTweet">送信</button>
<ul>
	<li v-for="(tweet,index) in tweets" v-bind:key="index">
		<td>@{{ tweet.id }}</td>
		<td>@{{ tweet.memo }} </td>
</ul>
	</h1>
	
	<div class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="text" placeholder="Search" v-model="search_term" aria-label="Search" />
  <button class="btn btn-outline-success my-2 my-sm-0" v-on:click.prevent="getArticles()">
    Search
  </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
var app = new Vue({
  el: '#app',
  data: {
    textInput:"入力してください",
    users: [],
    comments: [],
    tweets: []
  },
  mounted: function(){
  axios.get('/api/users').then(response => this.users = response.data);
  axios.get('/api/comments').then(response => this.comments = response.data);
  },
  methods: {
    postTweet() {
      axios.post('/api/tweets',{
      tweet: this,tweet
      })
    }
   }
})
</script>	
</body>
</html>