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
		posts: []

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
		add_not(state, not) {
                  state.nots.push(not)
            },

            add_post(state, post) {
                  state.posts.push(post)
            }
	}
	
})