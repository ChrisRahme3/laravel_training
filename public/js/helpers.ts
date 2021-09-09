// Capitalize the first letter of every word in `str`
export function toTitle(str : string = '') : string {
    return str.replace(/[^-\s]+/g, function(word : string) : string {
        return word.replace(/^./, function(first : string) : string {
            return first.toUpperCase();
        });
    });
}


// Capitalize the first letter in `str`
export function capitalize(str :string = '') : string {
    return str.charAt(0).toUpperCase() + str.slice(1);
}


// Truncate `str` to the last word before `n` characters if `cutLastWord` is false,
// otherwise it will directly cut at the `n`th characters
export function truncate(str : string, n : number, cutLastWord : boolean = false, ellipsis : boolean = true) : string {
    if (n <= 0) {
        return '';
    }

    if (str.length <= n) {
        return str;
    }

    n = ellipsis ? n - 3 : n;

    const sub : string  = str.substr(0, n - 1);
    const text : string = cutLastWord ? sub : sub.substr(0, sub.lastIndexOf(" "));

    return ellipsis ? text + "..." : text;
};
