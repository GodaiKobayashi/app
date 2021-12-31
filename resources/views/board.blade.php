@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}">戻る</a>
 <h1>展示版</h1>
	<h1 id="bpp">
   <li v-for="comment in comments" :key="comment.id">
       
			
			<p>@{{ comment.name }}</p>
			<p>@{{ comment.comment }}</p>
		
			
	</li>
     </h1>
     @include('post')
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
var app = new Vue({
  el: '#bpp',
  data: {
   
    comments: []
  },
  mounted: function(){
  
  axios.get('/api/comments').then(response => this.comments = response.data);

  },
  
   
})

</script>
@endsection