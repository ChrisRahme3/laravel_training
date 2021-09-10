export default {
    methods: {
		scrollTo(x : number, y : number) {
			setTimeout(() => {
				window.scroll({left: x, top: y, behavior: 'smooth'});
				console.log('Scroll to:', x, y)
			}, 200);
		},

		scrollToX(x : number) : void {
			this.scrollTo(x, 0);
		},

		scrollToY(y : number) : void {
			this.scrollTo(0, y);
		},

		scrollToTop() : void {
			this.scrollToX(0);
		}
	}
}
