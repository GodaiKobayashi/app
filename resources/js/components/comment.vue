<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        @{{comments}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
       data: {
   
    comments: []
  },
  mounted: function(){
  
  axios.get('/route/api/comments').then(response => this.comments = response.data);

  },
   
    }
</script>
