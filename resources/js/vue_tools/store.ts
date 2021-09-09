export const store : object = {
    state () : object {
		const ret : {card_count : number, show_product : boolean, product : object | null} = {
            card_count: 0,
            show_product: false,
            product: {},
        };

        return ret;
    },

    mutations: {
        addCard(state : object) : void {
            state['card_count']++;
        },

        setProduct(state : object, product : object) : void {
            state['product'] = product;
        },

        showProduct(state : object, show : boolean) : void {
            state['show_product'] = show;
        }
    }
}
