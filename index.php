<?php

//hardcoded User input
$posts = 0;
$railings = 5;
$length = 5;


//constants for post and railing lengths
define('POSTLENGTH', 0.1);
define('RAILINGLENGTH', 1.5);

//Preprocess the input
    //if posts, railings and length have a value, then message that cannot calculate from that
    //if posts and railings are equal assume knock off 1 from rails until
    //if calculating from railings, it cannot be 0
    //maybe form validation eventually
function checkInput(int $posts, int $railings, int $length):string {
    if ($posts === 0 && $railings === 0 && $length === 0) {
        return 'Check input<br />All values cannot be 0';
    } elseif ($posts > 0 && $railings > 0 && $length > 0) {
        return 'Check input<br />You cannot input values for posts, railings and length all at the same time';
    } elseif (($length > 0 && $posts > 0 && $railings === 0) || ($length > 0 && $posts === 0 && $railings > 0)) {
        return 'Check input<br />Length must be the only value or it must be 0.';
    }
}

if (checkInput($posts, $railings, $length)) {
    echo checkInput($posts, $railings, $length);
}


//calc posts and railings function to call the results of which go onto the screen


//workout what calculation performing
        //length from posts and railings
        //length and posts from railings
        //length and railings from posts
        //posts and railings from lengths


//function to calculate length (and posts or railings as necessary)

//function to calculate post and railings from length


//output function to build minimal HTML to display


