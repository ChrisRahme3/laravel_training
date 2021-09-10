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
		// This method executes on click on the "Inspect" button
        setProduct(event) : void {
			// Get the Y position of the card that has been clicked on to get back to it after closing the Single component
			const cardElement = event['target'].parentElement.parentElement.parentElement // .product-card element
			const _scrollPos = cardElement.getBoundingClientRect().top + window.scrollY // Y position of the Card that was clicked

			// Save information about the product that has been clicked on to show it in Single
			const _category : string = this.$props.category;
			const _product : object = this.$props.product

            this.$props.product.category = _category;

			// Save the Y position of the card, hide Cards, and show Single
			this.$store.commit('setScroll', {y: _scrollPos})
            this.$store.commit('setProduct', _product);
            this.$store.commit('showProduct', true);

			// Scroll back to the top of the page when displaying Single
			this.scrollToTop();
        }
    },

    mixins: [
		scrollMixin
    ]
}
</script>
