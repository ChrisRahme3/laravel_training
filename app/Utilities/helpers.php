<?php

// Capitalize the first letter of every word in `str`
function toTitle(string $str) {
    return ucwords($str, " \t\r\n\f\v");
}

?>