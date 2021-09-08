require('./bootstrap');

window.Vue = require('vue').default;
import 'es6-promise/auto' // Must be before Vuex
import Vuex from 'vuex'
import AsyncComputed from 'vue-async-computed'
import VueRouter from 'vue-router';
import { routes } from './routes';

Vue.use(Vuex);
Vue.use(VueRouter);

Vue.component('products-index', require('./components/products/Index.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const store = new Vuex.Store({
    state () {
        return {
            card_count: 0
        }
    },
    
    mutations: {
        addCard(state) {
            state.card_count++
        }
    }
});

const app = new Vue({
    el: '#app',
    router: router,
    store: store
});

//app.use(store);