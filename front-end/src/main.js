import 'babel-polyfill'
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'

/* dev trigger */
Vue.config.devtools = process.env.NODE_ENV !== 'production'
Vue.config.productionTip = process.env.NODE_ENV !== 'production'
/* dev trigger end */

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  render: h => h(App)
})
