<?php
function static_variable(){
    static $x = 10;
    $y = 20;

    $x++;
    $y++;
    echo "Static: " .$x ."</br>";
    echo "Non-static" .$y ."<\br>";
}

//first function call
static_variable();

//second function call
static_variable();
?>