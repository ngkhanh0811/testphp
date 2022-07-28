<?php
//Check if the type of a variable of integer
$x1 = 1024;
var_dump(is_int($x1));
echo "The given number $x1 is an integer </br>";
//Check again:
$x2 = 99.84;
var_dump(is_int($x2));
echo "The given nunber $x2 is an integer </br>";
echo "</br>";
$y = 6987;
var_dump(is_int($y));
echo "The given number $y is an integer </br>";
?>