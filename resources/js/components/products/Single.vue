<template>
    <div id="product-single">
        <div id="product-page" class="d-flex flex-row">
            <div id="product-image" class="d-flex flex-row">
                <button class="btn btn-primary float-right back" v-on:click="unsetProduct">
                    <i class="fas fa-angle-left"></i>
                </button>

                <img src="https://via.placeholder.com/900x600" :alt="product.name">
            </div>

            <div id="product-info">
                <div id="product-header">
                    <h1><a :href="'/product/' + product.category_id">{{ product.name | capitalizeWords }}</a></h1>
                    <h2>{{ product.price | toPrice }}</h2>
                </div>

                <hr><br>

                <div id="product-description">
                    <h5>{{ product['description'] }}</h5>
                    <p><b>Category:</b> <a :href="'/api/categories/' + product.category_id">{{ product.category + '|' + product.subcategory | completeCategory | capitalizeWords }}</a></p>
                    <p><b>Features:</b> {{ product.features_mod | capitalizeCommas }}</p>
                    <p><b>Keywords:</b> {{ product.keywords | capitalizeCommas }}</p>
                    <p><b>Product Code:</b> {{ product.code }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import productMixin from '../../mixins/productMixin';

export default {
    methods: {
        unsetProduct() {
            this.$store.commit('setProduct', null)
            this.$store.commit('showProduct', false)
        }
    },

    mixins: [
        productMixin
    ]
}
</script>

<style>

</style>
