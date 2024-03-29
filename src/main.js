import Vue from 'vue'
import App from './App.vue'
import router from './router'

import { createPinia, PiniaVuePlugin } from 'pinia'
Vue.use(PiniaVuePlugin)
const pinia = createPinia()


Vue.config.productionTip = false


new Vue({
  router,
  pinia,
  render: h => h(App)
}).$mount('#app')
