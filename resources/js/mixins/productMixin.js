export default {
    computed: {
        product() {
            obj.features_mod = obj.features.replaceAll('<p>', '').replaceAll('</p>', ', ').trim().slice(0, -1);

            return obj;
        }
    }
}
