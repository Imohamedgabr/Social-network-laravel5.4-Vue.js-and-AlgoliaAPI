<template>
      <div class="container">
            <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                        <div class="panel-body">
                              <textarea rows="3" class="form-control" v-model="content"></textarea>
                            <div class="row">
                            <br>
                              <button class="btn btn-success pull-right" :disabled="not_working" @click="create_post()">
                                    Create a post
                              </button>
                              <br>
                              <a href="/manage_posts"><button class="btn btn-success pull-left" @click="">
                                    Manage Posts
                              </button></a>
                            </div>
                        </div>
                        </div>
                  </div>
            </div>
            <div class="row">
              <div class="panel panel-default" v-for="post in posts">
                        <div class="panel-heading">
                            <img :src=" 'uploads/' + post.avatar" alt="" width="40px" height="40px" class="avatar-feed">
                            {{ post.name }}
                            <span class="pull-right">
                                {{ post.created_at }}
                            </span>
                        </div>

                        <div class="panel-body">
                            <p class="text-center">
                                {{ post.content }}
                            </p>
                            
                           
                            <div class="row">
                              <hr>
            
                            </div>
                            <div class="row">
                              <hr>
                                <button class="btn btn-primary btn-xs">
                                  Like this post
                                </button>
            
                            </div>
          
                        </div>
                    </div>
            </div>
      </div>
</template>

<script>


      export default {
            mounted() {

            },
            data() {
                  return {
                        content: '',
                        not_working: true,
                        posts:[]
                  }
            },
            methods: {
                  create_post() {
                        
                        axios.post('/create/post', {
                              content: this.content
                               })
                            .then((resp) => {
                                  this.content = ''
                                  // add notify 
                                  $.notify("your post has been added", "success");
                                  console.log(resp);
                                  var obj = {name: resp.data.user.name, avatar: resp.data.user.avatar, created_at: resp.data.post.created_at ,content: resp.data.post.content, id: resp.data.post.id };
                                  this.posts.push(obj);
                            })
                            .catch(function (error) {
                                 console.log(error);
                            });
                  }
            },
            watch: {
                  content() {
                        if(this.content.length > 0)
                              this.not_working = false
                        else
                              this.not_working = true
                  }
            }

      }
      
</script>