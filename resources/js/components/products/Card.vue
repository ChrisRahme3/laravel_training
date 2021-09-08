<template>
    <div class="card">
        <div class="card-body">
            <div>
                <h5 class="card-title">{{ product.name }}</h5>
                
                <div>
                    <p class="card-subtitle flex-auto float-left" >{{ category }} / {{ product.subcategory }}</p>
                    <p class="card-subtitle flex-auto float-right">{{ product.price }} $</p>
                </div>
            </div>
            
            <div>
                <p class="card-text">{{ product.description }}</p>
                <button class="btn btn-primary float-right" v-on:click="setProduct">
                    Inspect
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import Single from './Single.vue';

export default {
    props: [
        'product', 'category'
    ],

    created() {
        this.$store.commit('addCard');
    },

    methods: {
        setProduct() {
            let product = this.product;
            product.category = this.$props.category;

            this.$store.commit('setProduct', this.$props.product);
            this.$store.commit('showProduct', true);
        }
    },

    components: {
        Single
    }
}
</script>