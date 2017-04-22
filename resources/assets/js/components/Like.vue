<template>
      <div>
            <hr>
            <p class="text-center" v-for="like in post.likes">
                  <img :src=" 'uploads/' + like.user.avatar" alt="" width="40px" height="40px" class="avatar-like">
            </p>
            <hr>
            <button class="btn btn-primary btn-xs" v-if="!auth_user_likes_post" @click="like()">
                  Like this post
            </button>
            <button class="btn btn-danger btn-xs" v-else @click="unlike()">
                  Unlike this post
            </button>
      </div>
</template>

<script>
      export default {
            mounted() {

            },
            // to recieve the id from the feed component
            props: ['id'],
            computed: {
                  likers() {
                        var likers = []
                        
                        this.post.likes.forEach( (like) => {
                              likers.push(like.user.id)
                        })

                        return likers
                  },
                  auth_user_likes_post() {
                        var check_index = this.likers.indexOf( 
                              this.$store.state.auth_user.id
                         )

                         if (check_index === -1)
                              return false
                        else 
                              return true
                  },
                  // return the post from the store
                  post() {
                  	// this "find" method is looking for post's id and 
                  	// checking if it's equal to the id of the post
                        return this.$store.state.posts.find( (post) => {
                              return post.id === this.id
                        })
                  }
            },
            methods: {
                  like() {
                        
                        axios.get('/like/' + this.id) 
                            .then( (resp) => {
                                  this.$store.commit('update_post_likes', {
                                        id: this.id,
                                        like: resp.data
                                  })
                                  
                                  $.notify("you successfully liked this post", "success");
                            })
                  },
                  unlike() {
                       
                        axios.get('/unlike/' + this.id) 
                            .then( (response) => {

                                  this.$store.commit('unlike_post', {
                                        post_id: this.id,
                                        like_id: response.data
                                  })

                                  $.notify("you have unliked shit post", "success");
                            })
                  }
            }
      }
</script>


<style>
      .avatar-like{
            border-radius: 50%;
      }
</style>