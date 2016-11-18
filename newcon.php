<?php

$link = mysqli_connect('localhost','root','','lib2');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
  //mysql_close($link);
mysqli_select_db($link,'lib2' ) or die ('Database didnot select');
//echo 'Connected successfully';

?>
