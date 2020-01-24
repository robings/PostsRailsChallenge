<?php

//hardcoded User input
$posts = 5;
$railings = 0;
$length = 0;


//constants for post and railing lengths
define('POSTLENGTH', 0.1);
define('RAILINGLENGTH', 1.5);

/**
 * preprocesses user input
 * @param int $posts - the number of posts
 * @param int $railings - the number of railings
 * @param int $length - the length of the fence
 * @return string|null - return an error message or nothing.
 */
function checkInput(int $posts, int $railings, int $length) {
    if ($posts === 0 && $railings === 0 && $length === 0) {
        return 'Check input<br />All values cannot be 0';
    } elseif ($posts > 0 && $railings > 0 && $length > 0) {
        return 'Check input<br />You cannot input values for posts, railings and length all at the same time';
    } elseif (($length > 0 && $posts > 0 && $railings === 0) || ($length > 0 && $posts === 0 && $railings > 0)) {
        return 'Check input<br />Length must be the only value or it must be 0.';
    } else {
        return NULL;
    }
}



//run main function
calcPostsAndRailings($posts, $railings, $length);

//calc posts and railings function to call the results of which go onto the screen
function calcPostsAndRailings(int $posts, int $railings, int $length) {
    if (checkInput($posts, $railings, $length)) {
        echo checkInput($posts, $railings, $length);
        return;
    }
     echo whatToCalculate($posts, $railings, $length);
}

/**
 * workout what calculation performing
 * @param int $posts - number of posts
 * @param int $railings - number of railings
 * @param int $length - length
 * @return string to represent the type of calculation to perform
 */
function whatToCalculate(int $posts, int $railings, int $length): string {
    if ($posts > 0 && $railings > 0 && $length === 0) {
        return 'postsRailings'; //length from posts and railings
    } elseif ($posts === 0 && $railings > 0 && $length === 0) {
        return 'railingsOnly'; //length and posts from railings
    } elseif ($posts > 0 && $railings === 0 && $length === 0) {
        return 'postsOnly'; //length and railings from posts
    }  elseif ($posts === 0 && $railings === 0 && $length > 0) {
        return 'lengthOnly'; //posts and railings from lengths
    } else {
        echo 'oops this shouldn\'t have happened: function whatToCalculate';
    }
}


//function to calculate length (and posts or railings as necessary)

//function to calculate post and railings from length


//output function to build minimal HTML to display


