<?php
class Color{
    function Color(){
        $color_name = "Green";
        echo "color is: " . $color_name;
    }
    function changeColor(){
        $color_name = "Red";
        echo "updated color is: " . "$color_name";
    }
}
$objColor = new Color();
$objColor -> Color();
$objColor -> changeColor();
?>
