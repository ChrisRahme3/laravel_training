// Capitalize the first letter of every word in `str`
function toTitle(str = '') {
    return str.replace(/[^-\s]+/g, function(word) {
        return word.replace(/^./, function(first) {
            return first.toUpperCase();
        });
    });
}

// Truncate `str` to the last word before `n` characters if `cutLastWord` is false,
// otherwise it will directly cut at the `n`th characters
function truncate(str, n, cutLastWord = false, ellipsis = true) {
    if (n <= 0) {
        return '';
    }
    
    if (str.length <= n) {
        return str;
    }
    
    n = ellipsis ? n - 3 : n;

    const sub  = str.substr(0, n - 1);
    const text = cutLastWord ? sub : sub.substr(0, sub.lastIndexOf(" "));

    return ellipsis ? text + "..." : text;
};