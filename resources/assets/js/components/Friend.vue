<template>
   
        <div class="row">
            <p class="text-center" v-if="loading">
                Loading...
            </p>
            <p class="text-center" v-if="!loading">
                <button class="btn btn-success" v-if="status == 0" @click="add_friend" >Add Friend</button>
                <button class="btn btn-success" v-if="status == 'pending' " @click="accept_friend">Accept Friend</button>
                <span class="text-success" v-if="status == 'waiting' ">Waiting for response</span>
                <span class="text-success" v-if="status == 'friends' ">Friends</span>
            </p>
        </div>
    
</template>

<script>

export default {
    mounted() {
            var self = this;
            axios.get('/userfound/' + self.profile_user_id)
            .then(function (response) {
                console.log(response);
                self.status = response.data.status; 
                self.loading = false                  
            })
            .catch(function (error) {
                console.log(error);
              });
            },
    props: ['profile_user_id'],
    data(){
        return {
            status: '',
            loading: true
        }        
    },
    methods:{
        add_friend(){
            // you can do same here as well
            var self = this;
            self.loading = true
            axios.get('/add_friend/' + self.profile_user_id)
            .then(function (response) {
                console.log(response);
                if (response.data == 1) {
                    self.status = 'waiting'
                    self.loading = false
                }
            })
            .catch(function (error) {
                console.log(error);
              });
            },
            accept_friend(){
                var self = this;
                self.loading = true
            axios.get('/accept_friend/' + self.profile_user_id)
            .then(function (response) {
                console.log(response);
                if (response.data == 1) {
                    self.status = 'friends'
                    self.loading = false
                }
            })
            .catch(function (error) {
                console.log(error);
              });
            }
        }
    }

</script>
