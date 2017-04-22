import Vuex from 'vuex'
import Vue from 'vue'
window.Vue = require('vue');
window.Vue = Vue;
window.$ = window.jQuery = require('jquery');

Vue.use(Vuex)

export const store = new Vuex.Store({
	// state is the data we going have in our application
	state: {
		nots: [],
		posts: [],
    auth_user: {}

	},
	getters: {
              all_nots(state) {
                    return state.nots
              },
               all_nots_count(state) {
                  return state.nots.length
       		  },
       		  all_posts(state) {
                  return state.posts
              }
    },
	mutations:{
    // takes 2 arguments, the state object or array and the data 
    // that we pass to it from the route in the component
		add_not(state, not) {
                  state.nots.push(not)
            },

            add_post(state, post) {
                  state.posts.push(post)
            },
            auth_user_data(state, user) {
                  state.auth_user = user
            },
            update_post_likes(state, payload)
            {
                  var post = state.posts.find( (p) => {
                        return p.id === payload.id
                  })

                  post.likes.push(payload.like)
            },
            unlike_post(state, payload) {
                  // we find the post
                  var post = state.posts.find((p) => {
                        return p.id === payload.post_id
                  })
                  // we find the likes
                  var like = post.likes.find( (l) => {
                        return l.id === payload.like_id
                  })
                  // we delete that like
                  var index = post.likes.indexOf(like)
                  // splice deletes the like
                  post.likes.splice(index, 1)
            }
	}
	
})