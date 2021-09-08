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

<script>
import Single from './Single.vue';
import Card from './Card';

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
                    return toTitle(data[key]['name']);
                }));
            }).catch((error) => {
                console.log(error);
            });
        },

        getProducts() {
            axios.get(
                '/api/products'
            ).then((response) => {
                let data = response.data;

                this.products = Object.keys(data).map((key) => {
                    data[key]['name']        = truncate(data[key]['name'], 60, false);
                    data[key]['description'] = truncate(data[key]['description'], 100, false);
                    data[key]['subcategory'] = toTitle(data[key]['subcategory']);
                    return data[key];
                });
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
