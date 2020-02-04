<?php

require_once ('functions.php');
$result='';

//is there user input?
if (isset($_POST['posts'])) {
    //echo 'There is a get';

    $posts = $_POST['posts'];
    if ($posts == '') {
        $posts = 0;
    }

    $railings = $_POST['railings'];
    if ($railings =='') {
        $railings = 0;
    }

    $length = $_POST['length'];
    if ($length == '') {
        $length = 0;
    }

//constants for post and railing lengths
    define('POSTLENGTH', 0.1);
    define('RAILINGLENGTH', 1.5);

    $posts = trim($posts);
    $railings = trim($railings);
    $length = trim($length);

    if (checkInput($posts, $railings, $length)) {
        $result = 'Check input:<br />All values cannot be 0 or empty; no value can be a minus number.<br />You cannot enter an array';
        $result .= '<br />You cannot input values for posts, railings and length all at the same time.';
        $result .= '<br />Length must be the only value or it must be 0/empty.<br />You cannot have only one post.<br />';
    } elseif (whatToCalculate($posts, $railings, $length) === 'lengthOnly') {
        $result =  postRailingsCalculator($length, POSTLENGTH, RAILINGLENGTH);
    } else {
        $result = lengthCalculator(whatToCalculate($posts, $railings, $length), $posts, $railings, POSTLENGTH, RAILINGLENGTH);
    }

}

clearUp();

?>

<html>

<form action='index.php' method='post'>
    <label>Posts: </label><input type='text' name='posts' /><br /><br />
    <label>Railings: </label><input type='text' name='railings' /><br /><br />
    <label>Length: </label><input type='text' name='length' /><br /><br />
    <input type='submit' />
</form>
<?php echo $result; ?>

<a href='index.php'>Reset it</a>
</html>