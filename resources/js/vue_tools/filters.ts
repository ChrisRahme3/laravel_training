import { toTitle, capitalize, truncate } from '../../../public/js/helpers'

export const filters : {name: string, func: Function}[] = [
	{
		name: 'toPrice',
		func: function(value : number | string) : string {
			if (!value) value = 0;

			return value.toString() + ' $';
		}
	},

	{
		name: 'completeCategory',
		func: function (value : string) : string {
			if (!value) return '';

			const cats : string[]      = value.split('|');
			const category : string    = cats[0];
			const subcategory : string = cats[1];

			if ((subcategory.toLowerCase() != category.toLowerCase()) && (subcategory != '')) {
				value = category + ' / ' + subcategory;
			} else {
				value = category;
			}

			return value;
		}
	},

	{
		name: 'capitalizeWords',
		func: function (value : string) : string {
			if (!value) return '';

			return toTitle(value.toString());
		}
	},

	{
		name: 'capitalizeCommas',
		func: function (value : string) : string {
			if (!value) return '';

			let result : string = '';
			let phrases : string[] = value.split(',');

			phrases.forEach(phrase => {
				phrase = phrase.toString().trim();

				if (phrase) {
					if (result == '') {
						result = capitalize(phrase);
					} else {
						result = result + ', ' + capitalize(phrase);
					}
				}
			});

			return result;
		}
	},

	{
		name: 'truncate',
		func: function (value : string, amount : number = 10) {
			if (!value) return '';

			return truncate(value, amount, false);
		}
	}
]
