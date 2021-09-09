require('./bootstrap');
require("./hello-world").helloWorld();
window.Vue = require('vue').default;

import 'es6-promise/auto' // Must be before Vuex

import Vuex from 'vuex'
import VueRouter from 'vue-router';

import ProductsIndex from './components/products/Index';
import ProductsSingle from './components/products/Single';

Vue.use(Vuex);
Vue.use(VueRouter);


// Components
Vue.component('products-index', ProductsIndex);
Vue.component('products-single', ProductsSingle);


// Filters
Vue.filter('toPrice', function (value) {
	if (!value) value = '0';
	return value.toString() + ' $';
});

Vue.filter('completeCategory', function (value) {
	if (!value) return '';
	let result = '';

	const cats        = value.split('|');
	const category    = cats[0];
	const subcategory = cats[1];

	if ((subcategory.toLowerCase() != category.toLowerCase()) && (subcategory != '')) {
		value = category + ' / ' + subcategory;
	} else {
		value = category;
	}

	return value;
});

Vue.filter('capitalizeWords', function (value) {
	if (!value) return '';
	return toTitle(value.toString());
});

Vue.filter('capitalizeCommas', function (value) {
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
});

Vue.filter('truncate', function (value, amount = 10) {
	if (!value) value = '';

	return truncate(value, amount, false);;
});


// Router
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


// Vuex
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


// Vue
const app = new Vue({
    el: '#app',
    router: router,
    store: store
});
