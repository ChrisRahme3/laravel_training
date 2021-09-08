require('./bootstrap');

window.Vue = require('vue').default;
import 'es6-promise/auto' // Must be before Vuex
import Vuex from 'vuex'
import VueRouter from 'vue-router';

import ProductsIndex from './components/products/Index';
import ProductsSingle from './components/products/Single';

Vue.use(Vuex);
Vue.use(VueRouter);

Vue.component('products-index', ProductsIndex);
Vue.component('products-single', ProductsSingle);

Vue.filter(
    'toPrice',
    function (value) {
        if (!value) value = '0';
        return value.toString() + ' $';
    }
);

Vue.filter(
    'capitalizeWords',
    function (value) {
        if (!value) return '';
        return toTitle(value.toString());
    }
);

Vue.filter(
    'capitalizeCommas',
    function (value) {
        if (!value) return '';

        let result = '';
        let phrases = value.split(',');

        phrases.forEach(phrase => {
            phrase = phrase.toString().trim();

            if (phrase) {
				if (result == '') {
					result = capitalize(phrase);
				} else {
					result = result + ', ' + capitalize(phrase);
				}
            }
        });

        return result;
    }
)

const router = new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/products/index_vue',
            name: 'ProductsIndex',
            component: ProductsIndex
        }
    ]
});

const store = new Vuex.Store({
    state () {
        return {
            card_count: 0,
            show_product: false,
            product: {},
        }
    },

    mutations: {
        addCard(state) {
            state.card_count++;
        },

        setProduct(state, product) {
            state.product = product;
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
