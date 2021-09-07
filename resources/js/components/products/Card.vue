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
                <a :href="`/product/${product.id}`" class="btn btn-primary float-right" target="_blank">Go</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['product', 'category']
}
</script>