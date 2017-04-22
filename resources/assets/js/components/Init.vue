<template>
      <div>

      </div>
</template>

<script>
      export default {
            mounted() {
              // to access the authenticated user's data
                  this.get_auth_user_data()
            },
            methods: {
                  get_auth_user_data() {
        
                        axios.get('/get_auth_user_data') 
                            .then( (resp) => {
                            // we are commiting to the method from the store
                            // and storing data into the user object in state
                                    this.$store.commit('auth_user_data', resp.data)
                            })
                  }
            }
      }
</script>