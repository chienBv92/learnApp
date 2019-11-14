
require('./bootstrap');
//window.Vue = require('vue');
import Vue from 'vue';
import Layout from  '../component/Layout';

Vue.config.devtools = true;
//Vue.component('app-component', require('../component/App').default())

const app = new Vue({
    el: '#app',
    components: {
        Layout: Layout
    }
});
