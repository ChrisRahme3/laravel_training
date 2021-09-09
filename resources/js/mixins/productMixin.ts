export default {
    computed: {
        product(): object {
            let obj : object = this.$store.state.product;

            obj['features_mod'] = obj['features'].replaceAll('<p>', '').replaceAll('</p>', ', ').trim().slice(0, -1);

            return obj;
        }
    }
}
