require('./bootstrap');

window.Vue = require('vue').default;
import 'es6-promise/auto' // Must be before Vuex
import Vuex from 'vuex'
import VueRouter from 'vue-router';
//import { routes } from './routes';

import ProductsIndex from './components/products/Index';
import ProductsSingle from './components/products/Single';

Vue.use(Vuex);
Vue.use(VueRouter);

Vue.component('products-index', require('./components/products/Index.vue').default);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/products/index_vue',
            name: 'ProductsIndex',
            component: ProductsIndex
        },
        {
            path: '/products/single_vuex',
            name: 'ProductsSingle',
            component: ProductsSingle
        }
    ]
});

const store = new Vuex.Store({
    state () {
        return {
            card_count: 0,
            products: []
        }
    },

    mutations: {
        addCard(state) {
            state.card_count++
        },

        addProduct(state, product) {
            state.products.push(product)
        },

        setProducts(state, products) {
            state.products = products
        }
    }
});

const app = new Vue({
    el: '#app',
    router: router,
    store: store
});