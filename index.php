<?php

require_once ('functions.php');

//hardcoded User input
$posts = 0;
$railings = 0;
$length = 3.3;


//constants for post and railing lengths
define('POSTLENGTH', 0.1);
define('RAILINGLENGTH', 1.5);





//run main function
calcPostsAndRailings($posts, $railings, $length);


?>

<html>

<form action='index.php' method='get'>
    <label>Posts: </label><input type='number' name='posts' /><br /><br />
    <label>Railings: </label><input type='number' name='railings' /><br /><br />
    <label>Length: </label><input type='number' name='length' /><br /><br />
    <input type='submit' />
</form>

</html>