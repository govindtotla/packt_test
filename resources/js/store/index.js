import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const debug = process.env.NODE_ENV !== 'production';

export default new Vuex.Store({
  state: {
    posts: [],
  },

  actions: {
    async getAllPosts({ commit }) {
      return commit('setPosts', await axios.get('/api/products'))
    },
  },

  mutations: {
    setPosts(state, response) {
      state.posts = JSON.parse(response.data.data);
    },
  },
  strict: debug
});
