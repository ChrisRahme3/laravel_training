import ProductsIndex from '../components/products/Index.vue';

export const router : object = {
		mode: 'history',

		routes: [
			{
				path: '/products/index_vue',
				name: 'ProductsIndex',
				component: ProductsIndex
			}
		],
}
