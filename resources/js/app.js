import Vue from 'vue';

window.Vue = Vue;

require('./bootstrap');

Vue.component('app', require('./components/App.vue').default);
Vue.component('login', require('./components/Login.vue').default);
Vue.component('register', require('./components/Register.vue').default);

// kick off vue instance
new Vue({
  el: '#app',
});
