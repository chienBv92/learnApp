
//require('./bootstrap');
//window.Vue = require('vue');
import Vue from 'vue';
import VueRouter from "vue-router";
import {routes} from "./routes";
import  {store} from "./store";
// sử dụng button toggle
import ToggleSwitch from 'vuejs-toggle-switch'
Vue.use(ToggleSwitch);

window.axios = require('axios');

//import Bootrap from  './bootstrap';

import Layout from '../../component/management/layout/Layout';

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
    store,
    components: {
        Layout: Layout
    }
});
