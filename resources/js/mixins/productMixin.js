export default {
    computed: {
        product() {
            let obj = this.$store.state.product;

            if ((obj.subcategory != obj.category) && (obj.subcategory != '')) {
                obj.category_mod = obj.category + ' / ' + obj.subcategory;
            } else {
                obj.category_mod = obj.category;
            }

            obj.price_mod    = obj.price + ' $'
            obj.features_mod = obj.features.replaceAll('<p>', '').replaceAll('</p>', ', ').trim().slice(0, -1);
            obj.keywords_mod = toTitle(obj.keywords);

            return obj;
        }
    }
}