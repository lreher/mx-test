import Vue from 'vue';

// axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// vue
window.Vue = Vue;
Vue.component('app', require('./pages/App.vue').default);
Vue.component('login', require('./pages/Login.vue').default);
Vue.component('register', require('./pages/Register.vue').default);

// kick off vue instance
new Vue({
  el: '#app',
});
