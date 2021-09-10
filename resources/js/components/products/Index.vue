<template>
    <div id="products-index">
        <Single v-if="this.$store.state.show_product"/>

        <div id="products-grid" class="row" v-else>
            <div v-for="product in products" :key="product.id" class="card-container col-sm-3">
                <Card :product="product" :category="categories[product.category_id]"/>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import Single from './Single.vue';
import Card from './Card.vue';
import axios, { AxiosResponse } from 'axios';

export default {
    data() : object {
		const ret : {categories : string[], products : object} = {
            categories: ['None'],
            products: {}
        };

        return ret;
    },

    created() : void {
		this.$store.commit('setScroll', null);

        this.getCategories();
        this.getProducts();
    },

    methods: {
        getCategories() : void {
            axios.get(
                '/api/categories'
            ).then((response : AxiosResponse<any>) => {
                let data : object = response.data;

                this.categories = this.categories.concat(Object.keys(data).map((key) => {
                    return data[key]['name'];
                }));
            }).catch((error: any) => {
                console.log(error);
            });
        },

        getProducts() : void {
            axios.get(
                '/api/products'
            ).then((response : AxiosResponse<any>) => {
				this.products = response.data;
            }).catch((error : any) => {
                console.log(error);
            });
        }
    },

    computed: {
        cardCount() : number {
            return this.$store.state.card_count;
        }
    },

    components: {
        Single,
        Card
    }
}
</script>
