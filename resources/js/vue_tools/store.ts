export const store : object = {
    state () : object {
		const ret : {
			card_count : number,
			show_product : boolean,
			product : object | null,
			scroll : {x : number, y : number}
		} = {
            card_count: 0,
            show_product: false,
            product: {},
			scroll: {x: 0, y: 0}
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
        },

		setScroll(state : object, scroll : object | null) : void {
			if (!scroll) {
				state['scroll'] = {x: 0, y: 0};
			} else {
				const x : number = scroll.hasOwnProperty('x') ? Math.round(100 * scroll['x']) / 100 : state['scroll']['x'];
				const y : number = scroll.hasOwnProperty('y') ? Math.round(100 * scroll['y']) / 100 : state['scroll']['y'];
				state['scroll'] = {x: x, y: y};
			}
		}
    }
}
