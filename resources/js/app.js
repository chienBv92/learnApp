
//require('./bootstrap');
//window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from "vue-router";
import {routes} from "./routes";

//import Bootrap from  './bootstrap';

import Layout from  '../component/Layout';

Vue.use(VueRouter);
// sử dụng router bằng biến mới tên router
const router =  new VueRouter({
    // mode: 'history',
    routes
})

Vue.config.devtools = true;
//Vue.component('app-component', require('../component/App').default())


const app = new Vue({
    el: '#app',
    router,
    components: {
        Layout: Layout
    }
});
