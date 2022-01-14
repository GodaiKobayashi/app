<h1 id="cpp">
<form>
<input type="text" placeholder="" v-model="comment">
      <button v-model="onPost"  plain>投稿</button>
    </form>
    </h1>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
var app = new Vue({
  el: '#cpp',
  data: {
   users: [],
    comment:'',
  },
  methods: {
  onPost:function(){
        axios.post("/post",{ 
            login_id : this.users.id,
            naem : this.users.name,
            comment: this.comment
        },).then((response) => {
            // ちゃんと送信できたか確認用
            console.log(response);
        })
        .catch((err) => {
            console.log(err);
        });
        },
    },
     mounted() {   
    axios.get("/api/users").then((response) => (this.users = response.data));
    },
 
   
})
</script>