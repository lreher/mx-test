import Vue from 'vue';

window.Vue = Vue;

require('./bootstrap');

Vue.component('app-component', require('./components/App.vue').default);

// kick off vue instance
new Vue({
  el: '#app',
});
