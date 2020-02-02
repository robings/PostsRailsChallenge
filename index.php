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

//run main function
    //echo $posts;
    if (checkInput($posts, $railings, $length)) {
        echo checkInput($posts, $railings, $length);
    } elseif (whatToCalculate($posts, $railings, $length) === 'lengthOnly') {
        $result =  postRailingsCalculator($length, POSTLENGTH, RAILINGLENGTH);
    } else {
        $result = lengthCalculator(whatToCalculate($posts, $railings, $length), $posts, $railings, POSTLENGTH, RAILINGLENGTH);
    }

    //$result = calcPostsAndRailings($posts, $railings, $length);

} else {
    //echo 'There is no get';
}

// clear up
clearUp();


?>

<html>

<form action='index.php' method='post'>
    <label>Posts: </label><input type='text' name='posts' /><br /><br />
    <label>Railings: </label><input type='text' name='railings' /><br /><br />
    <label>Length: </label><input type='text' name='length' /><br /><br />
    <input type='submit' />
</form>
<?php
 echo $result;
?>
</html>