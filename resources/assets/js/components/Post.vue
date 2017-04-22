<template>
      <div class="container">
            <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                        <div class="panel-body">
                              <textarea rows="3" class="form-control" v-model="content"></textarea>
                              <br>
                              <button class="btn btn-success pull-right" :disabled="not_working" @click="create_post()">
                                    Create a post
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
                        not_working: true
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
                                  console.log(resp)
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