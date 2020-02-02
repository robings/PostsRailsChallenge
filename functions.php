<?php

/**
 * checks input for problems
 * @param $posts - value from posts input on form
 * @param $railings - value from railings input from form
 * @param $length - value from length input from form
 * @return string|null - a string with an error message, or a NULL
 */
function checkInput($posts, $railings, $length) {
    if ($posts === 0 && $railings === 0 && $length === 0) {
        return 'Check input<br />All values cannot be 0 or empty.<br />';
    } elseif ($posts == 1) {
        return 'There must be at least 2 posts for a fence.<br />';
    } elseif ($posts > 0 && $railings > 0 && $length > 0) {
        return 'Check input<br />You cannot input values for posts, railings and length all at the same time.br />';
    } elseif (($length > 0 && $posts > 0 && $railings === 0) || ($length > 0 && $posts === 0 && $railings > 0)) {
        return 'Check input<br />Length must be the only value or it must be 0/empty.<br />';
    } else {
        return NULL;
    }
}

/**
 * workout what calculation performing
 * @param $posts - number of posts
 * @param $railings - number of railings
 * @param $length - length
 * @return string to represent the type of calculation to perform
 */
function whatToCalculate($posts,  $railings, $length): string {
    if ($posts > 0 && $railings > 0 && $length === 0) {
        return 'postsRailings'; //length from posts and railings
    } elseif ($posts === 0 && $railings > 0 && $length === 0) {
        return 'railingsOnly'; //length and posts from railings
    } elseif ($posts > 0 && $railings === 0 && $length === 0) {
        return 'postsOnly'; //length and railings from posts
    }  elseif ($posts === 0 && $railings === 0 && $length > 0) {
        return 'lengthOnly'; //posts and railings from lengths
    } else {
        return 'oops this shouldn\'t have happened: function whatToCalculate';
    }
}


/**
 * function to calculate length of fence based on input of posts and/or railings
 * @param string $type - the type of calculation required
 * @param int $posts - the number of posts
 * @param int $railings - the number of railings
 * @param float $postLength - constant for the length of the posts
 * @param float $railingLength - constant for the length of the railings
 * @return string - the calculation and relevant information about the input from which the calculation was made
 */
function lengthCalculator (string $type, int $posts, int $railings, float $postLength, float $railingLength): string {
    $returnString = '';
    if ($type === 'postsRailings') {
        if ($railings === $posts) {
            $railings -= 1;
            $returnString = 'Railings reduced by one as number of posts must be 1 more than number of railings <br />';
        }
        $returnString .= 'Posts inputted: ' . $posts . '<br />Railings inputted: ' . $railings . '<br />';
        $returnString .= 'Length: ' . (($railings * $railingLength) + ($posts * $postLength))  . 'm<br />';
        return $returnString;
    } elseif ($type === 'railingsOnly') {
        $returnString = 'No of railngs inputted: ' . $railings . '<br />Posts: ' . ($railings + 1) . '<br />';
        $returnString .= 'Length: ' . (($railings * $railingLength) + (($railings + 1) * $postLength))  . 'm<br />';
        return $returnString;
    } elseif ($type === 'postsOnly') {
        $returnString = 'No of posts inputted: ' . $posts . '<br />Railings: ' . ($posts - 1) . '<br />';
        $returnString .= 'Length: ' . (($posts - 1) * $railingLength + ($posts * $postLength)) . 'm<br />';
        return $returnString;
    }
}

/**
 * function to calculate posts and railings from an inputted length
 * @param float $length - the length input
 * @param float $postLength - constant for length of posts
 * @param float $railingLength - constant for length of railings
 * @return string - the calculation and relevant information about the input from which the calculation was made
 */
function postRailingsCalculator (float $length, float $postLength, float $railingLength): string {
    $buildLength = $postLength;
    $noOfPosts = 1;
    $noOfRailings = 0;
    while ($buildLength < $length) {
        $buildLength += ($railingLength + $postLength);
        $noOfPosts +=1;
        $noOfRailings +=1;
    }
    if ($noOfPosts != $noOfRailings+1) {
        return 'oops, something went wrong: postRailingsCalculator function';
    } else {
        $toReturn = 'Length inputted: ' . $length . 'm<br />';
        $toReturn .= 'Posts: ' . $noOfPosts . '<br />' . 'Railings: ' . $noOfRailings . '<br />';
        $toReturn .= 'Total Length of resulting fence: '  . $buildLength . 'm<br />';
        //$lengthDiff = $buildLength - $length;
        //echo gettype($buildLength);
        //echo gettype($length);
        //$toReturn .= 'Difference from input length: ' . $lengthDiff;
        return $toReturn;
    }
}

/**
 * function to unset POST data
 */
function clearUp()
{
    unset($_POST);
}