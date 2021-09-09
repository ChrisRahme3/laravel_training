<template>
    <div>
        <Single v-if="this.$store.state.show_product"/>

        <div id="products-grid" class="row" v-if="!this.$store.state.show_product">
            <div v-for="product in products" :key="product.id" class="card-container col-sm-3">
                <Card :product="product" :category="categories[product.category_id]"/>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import Single from './Single.vue';
import Card from './Card.vue';
import axios from 'axios';

export default {
    data() {
        return {
            categories: ['None'],
            products: {}
        }
    },

    created() {
        this.getCategories();
        this.getProducts();
    },

    methods: {
        getCategories() {
            axios.get(
                '/api/categories'
            ).then((response) => {
                let data = response.data;

                this.categories = this.categories.concat(Object.keys(data).map((key) => {
                    return data[key]['name'];
                }));
            }).catch((error) => {
                console.log(error);
            });
        },

        getProducts() {
            axios.get(
                '/api/products'
            ).then((response) => {
				this.products = response.data;
            }).catch((error) => {
                console.log(error);
            });
        }
    },

    computed: {
        cardCount() {
            return this.$store.state.card_count;
        }
    },

    components: {
        Single,
        Card
    }
}
</script>
