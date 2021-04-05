import Vue from 'vue';

// axios
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// vue
window.Vue = Vue;

// Register Pages
Vue.component('app', require('./pages/App.vue').default);
Vue.component('login', require('./pages/Login.vue').default);
Vue.component('register', require('./pages/Register.vue').default);

// Helper Components
Vue.component('flash-notice', require('./components/FlashNotice.vue').default);

// App Components
Vue.component('app-header', require('./components/app/AppHeader.vue').default);
Vue.component('app-user-details', require('./components/app/UserDetails.vue').default);
Vue.component('app-user-addresses', require('./components/app/UserAddresses.vue').default);


// kick off vue instance
new Vue({
  el: '#app',
});
