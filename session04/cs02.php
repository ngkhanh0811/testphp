<?php
$x = 5;
function Test(){
    echo "Following line shows an error since variable x is declared outside the function.";
    echo "<p>Variable x inside function is: $x</p>";
}
Test();
echo "<p>Variable x outside function is: $x</p>";
?>