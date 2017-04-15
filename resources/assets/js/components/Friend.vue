<template>
    <div class="container">
        <div class="row">
            
            component ready

        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            // this axios.get('/check_relationship_status/' + this.profile_user_id)
            //     .then(function (response) {
            //         console.log(response);
            //     })

            // Make a request for a user with a given ID 
axios.get('/userfound/' + this.profile_user_id)
  .then(function (response) {
    console.log(response);
  })
  .catch(function (error) {
    console.log(error);
  });
        },
        props: ['profile_user_id'],
    }
</script>
