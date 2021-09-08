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

            return obj;
        }
    }
}
