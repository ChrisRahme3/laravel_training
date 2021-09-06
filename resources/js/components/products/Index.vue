<template>
    <div>
        <div id="products-grid" class="row">
            <div v-for="product in products" :key="product.id" class="col-sm-3" style="padding-bottom: 30px">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title">{{ product.name }}</h5>
                            
                            <div>
                                <p class="card-subtitle flex-auto float-left" >{{ categories[product.category_id] }} / {{ product.subcategory }}</p>
                                <p class="card-subtitle flex-auto float-right">{{ product.price }} $</p>
                            </div>
                        </div>
                        
                        <div>
                            <p class="card-text">{{ product.description }}</p>
                            <a :href="`../product/${product.id}`" class="btn btn-primary float-right" target="_blank">Go</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            categories: ['None'],
            products: {},
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
            })
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
            })
        }
    }
}
</script>

<style>

</style>