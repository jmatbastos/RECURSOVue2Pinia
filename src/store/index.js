import Vue from 'vue'
import Vuex from 'vuex'
import courses from './courses'
import categories from './categories'
import user from './user'
import enrolls from './enrolls'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    courses,
    categories,    
    user,
    enrolls
  }
 })
