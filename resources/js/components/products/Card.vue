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

<script lang="ts">
export default {
    props: [
        'product', 'category'
    ],

    created() {
		this.$store.commit('addCard');
    },

    methods: {
        setProduct() : void {
			let _category : string = this.$props.category;
			let _product : object = this.$props.product
			let _show : boolean = true;

            this.$props.product.category = _category;

            this.$store.commit('setProduct', _product);
            this.$store.commit('showProduct', _show);
        }
    }
}
</script>
