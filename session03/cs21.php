<?php
$a = 123;
var_dump(is_numeric($a));
$b = "5985";
var_dump(is_numeric($b));
$c = "59.82" + 100;
var_dump(is_numeric($c));
$d = "Hello";
var_dump(is_numeric($d));
?>