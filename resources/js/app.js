import axios from 'axios';
window.$ = window.jQuery = require('jquery');

window.axios = axios;

// Set Axios
axios.defaults.headers.common = {
    // 'X-CSRF-TOKEN': window.Laravel.csrfToken,
    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content'),
    'X-Requested-With': 'XMLHttpRequest'
};

require('./bootstrap');

window.Vue = require('vue');


Vue.component('money-table', require('./components/moneyTable.vue'));

const app = new Vue({
    el: '#app'
});
