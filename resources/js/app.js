require('./bootstrap');

window.Vue = require('vue').default;
import AsyncComputed from 'vue-async-computed'
import VueRouter from 'vue-router';
import { routes } from './routes';

Vue.use(AsyncComputed);
Vue.use(VueRouter);

Vue.component('products-index', require('./components/products/Index.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router
});
