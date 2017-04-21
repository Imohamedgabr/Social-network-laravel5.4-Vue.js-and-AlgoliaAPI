<template>
      <li>
            <a href="/notifications">
                  Unread notifications
                  <span class="badge">{{ all_nots_count }}</span>
            </a>
      </li>
</template>

<script>
      export default {
            mounted() {
                  this.get_unread()
            },
            methods: {
                  get_unread() {
                       axios.get('/get_unread') 
                            .then( (nots) => {
                              // console.log(nots);
                             nots.data.forEach( (not) => {
                              // the store.js mutation method
                                        this.$store.commit('add_not', not)
                                  })   
                            })
                            .catch(function (error) {
                             console.log(error);
                            });
                        }
                      },
            computed: {
                  all_nots_count() {
                        return this.$store.getters.all_nots_count
                  }
            }
      }
</script>