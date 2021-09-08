<template>
    <div id="product-single">
        <div id="product-page" class="d-flex flex-row">
            <div class="d-flex flex-row">
                <button class="btn btn-primary float-right back" v-on:click="unsetProduct">
                    <i class="fas fa-angle-left"></i>
                </button>

                <div id="product-image">
                    <img src="https://via.placeholder.com/900x600" :alt="product.name">
                </div>
            </div>

            <div id="product-info">
                <div id="product-header">
                    <h1>{{ product.name }}</h1>
                    <h2>{{ product.price }} $</h2>
                </div>

                <hr><br>

                <div id="product-description">
                    <h5>{{ product['description'] }}</h5>
                    <p><b>Category:</b> <a :href="'/api/categories/' + product.category_id">{{ product.category_mod }}</a></p>
                    <p><b>Features:</b> {{ product.features_mod }}</p>
                    <p><b>Keywords:</b> {{ product.keywords_mod }}</p>
                    <p><b>Product Code:</b> {{ product.code }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed: {
        product() {
            let obj = this.$store.state.product;

            if ((obj.subcategory != obj.category) && (obj.subcategory != '')) {
                obj.category_mod = obj.category + ' / ' + obj.subcategory;
            } else {
                obj.category_mod = obj.category;
            }

            obj.features_mod = obj.features.replaceAll('<p>', '').replaceAll('</p>', ', ').trim().slice(0, -1);
            obj.keywords_mod = toTitle(obj.keywords);

            return obj;
        }
    },

    methods: {
        unsetProduct() {
            this.$store.commit('setProduct', null)
            this.$store.commit('showProduct', false)
        }
    },
}
</script>

<style>

</style>