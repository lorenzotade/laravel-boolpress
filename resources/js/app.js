/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import App from './App.vue';

import router from './routes';

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    router,
    render: h => h(App),
});
