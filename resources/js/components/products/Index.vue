<template>
    <div>
        <div class="row">
            <div v-for="product in products" :key="product.id" class="col-sm-3" style="padding-bottom: 30px">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        
                        <div class="mb-4">
                            <p class="card-subtitle flex-auto float-left" >{{ categories[product.category_id] }} / {{ product.subcategory }}</p>
                            <p class="card-subtitle flex-auto float-right">{{ product.price }}$</p>
                        </div>
                        
                        <p class="card-text mt-5" style="font-size: 0.9rem">{{ product.description }}</p>
                        <a :href="'../api/products/' + product.id" class="btn btn-primary float-right">Go</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!--<router-link :to="{name: 'ProductsCreate'}" class="btn btn-primary m-2">
            Test Button
        </router-link>-->
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