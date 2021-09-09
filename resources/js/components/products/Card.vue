<template>
    <div class="card">
        <div class="card-body">
            <div>
                <h5 class="card-title">{{ product.name | truncate(60) }}</h5>

                <div>
                    <p class="card-subtitle flex-auto float-left" >{{ category + '|' + product.subcategory | completeCategory | capitalizeWords }}</p>
                    <p class="card-subtitle flex-auto float-right">{{ product.price | toPrice }}</p>
                </div>
            </div>

            <div>
                <p class="card-text">{{ product.description | truncate(80) }}</p>
                <button class="btn btn-primary float-right" v-on:click="setProduct">
                    Inspect
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'product', 'category'
    ],

    created() {
		this.$store.commit('addCard');
    },

    methods: {
        setProduct() {
            this.$props.product.category = this.$props.category;

            this.$store.commit('setProduct', this.$props.product);
            this.$store.commit('showProduct', true);
        }
    }
}
</script>
