require('./bootstrap');

window.Vue = require('vue').default;
import 'es6-promise/auto' // Must be before Vuex
import Vuex from 'vuex'
import VueRouter from 'vue-router';

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
            show_product: false,
            product: {},
            products: []
        }
    },

    mutations: {
        addCard(state) {
            state.card_count++;
        },

        setProduct(state, product) {
            state.product = product;
        },

        setProducts(state, products) {
            state.products = products;
        },

        showProduct(state, show) { // show: Boolean
            state.show_product = show;
        }
    }
});

const app = new Vue({
    el: '#app',
    router: router,
    store: store
});