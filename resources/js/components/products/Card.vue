<template>
    <div :id="'product-card-' + product.id" class="product-card card">
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
import scrollMixin from '../../mixins/scrollMixin';

export default {
    props: [
        'product', 'category'
    ],

    created() {
		this.$store.commit('addCard');
    },

    methods: {
        setProduct(event) : void {
			const cardElement = event['target'].parentElement.parentElement.parentElement // .product-card element
			const _scrollPos = cardElement.getBoundingClientRect().top + window.scrollY // Y position of the Card that was clicked

			const _category : string = this.$props.category;
			const _product : object = this.$props.product

            this.$props.product.category = _category;

			this.$store.commit('setScroll', {y: _scrollPos})
            this.$store.commit('setProduct', _product);
            this.$store.commit('showProduct', true);

			this.scrollToTop();
        }
    },

    mixins: [
		scrollMixin
    ]
}
</script>
