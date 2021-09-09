require("./ts-test").testTs();

import $ from 'jquery';
window['jQuery'] = $;
window['$'] = $;

require('./bootstrap');

import Vue from 'vue';
window.Vue = require('vue').default;

import 'es6-promise/auto' // Must be before Vuex

import Vuex from 'vuex'
import VueRouter from 'vue-router';

import ProductsIndex from './components/products/Index.vue';
import ProductsSingle from './components/products/Single.vue';

const required_filters = require('./vue_tools/filters').filters;
const required_router = require('./vue_tools/router').router;
const required_store = require('./vue_tools/store').store;


Vue.use(Vuex);
Vue.use(VueRouter);


// Components
Vue.component('products-index', ProductsIndex);
Vue.component('products-single', ProductsSingle);


// Filters
required_filters.forEach(filter => {
	Vue.filter(filter['name'], filter['func'])
});


// Router
const router = new VueRouter(required_router);


// Vuex
const store = new Vuex.Store(required_store);


// Vue
const app = new Vue({
    el: '#app',
    router: router,
    store: store
});
