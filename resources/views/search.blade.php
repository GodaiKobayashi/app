@extends('layouts.app')
 <link href="{{ asset('css/search.css') }}" rel="stylesheet">
@section('content')
    <div class="search">
        <h1>ユーザー検索機能</h1>
	        
	      <div id="bpp">
            <h3><input type="text" v-model="keyword"></h3>
                <table>
                  <thead>
                      <tr>
                          <th scope="col">名前</th>
                          <th scope="col">TwitterID</th>
                          <th scope="col">ハード</th>
                          <th scope="col">ランク</th>
                          <th scope="col">詳細</th>
                      </tr>    
                  </thead>
                </table>
                
                <li v-for="profile in filteredProfiles" :key="profile.id">
                    <table>
                        <tbody>
                            <tr>
                                <th>@{{ profile.name }}</th>
                  			        <th>@{{ profile.short }}</th>
                  			        <th>@{{ profile.device }}</th>
                  			        <th>@{{ profile.rank }}</th>
                  			        <th><a :href="/profiles/+profile.id">詳細</a></th>
                            </tr>
                        </tbody>
        			      </table>
	              </li>
         </div>
    </div>
    
      <div class="back"><a href="{{ route('home') }}">戻る</a></div>
      
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
var app = new Vue({
  el: '#bpp',
  data: {
    keyword: '',
    profiles: [],
  },
  mounted: function(){
  axios.get('/api/profiles').then(response => this.profiles = response.data);

  },
    computed: {
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
<style>
h3{
    text-align: center;
    margin: 0 auto;
    padding: 1em 0em;
}
table {
  border-collapse: collapse;
  margin: 0 auto;
  padding: 0;
  width: 80%;
  table-layout: fixed;
}

table tr {
  background-color: #fff;
  border: 1px solid #bbb;
  padding: .35em;
}
table th,
table td {
  padding: 1em 10px 1em 1em;
  border-right: 1px solid #bbb;
}
table th {
  font-size: .85em;
}
table thead tr{
  background-color: #eee;
}

@media screen and (max-width: 600px) {
  table {
    border: 0;
    width:100%
  }
  table th{
    background-color: #eee;
    display: block;
    border-right: none;
  }
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  
  table tr {
    display: block;
    margin-bottom: .625em;
  }
  
  table td {
    border-bottom: 1px solid #bbb;
    display: block;
    font-size: .8em;
    text-align: right;
    position: relative;
    padding: .625em .625em .625em 4em;
    border-right: none;
  }
  
  table td::before {
    content: attr(data-label);
    font-weight: bold;
    position: absolute;
    left: 10px;
  }
  
  table td:last-child {
    border-bottom: 0;
  } border-bottom: 0;
 
}
</style>
@endsection
  

        
 