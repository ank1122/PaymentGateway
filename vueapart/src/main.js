import Vue from 'vue'
import axios from 'axios'
import VueRouter from 'vue-router';
import App from './App.vue'
import { routes } from './routes'; 
// import qs from 'qs';

Vue.use(VueRouter);
export const bus = new Vue();
const router = new VueRouter({
  routes
});


Vue.prototype.$http = axios

Vue.config.productionTip = false 

new Vue({
  router,
  render: h => h(App),

}).$mount('#app')
