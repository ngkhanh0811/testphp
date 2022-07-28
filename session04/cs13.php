<?php
$a = 9;
$b = 12;
if($a && $b){
    echo "Test 1: Both a and b are true <br/>";
} else{
    echo "Test 1: Both a and b are false <br/>";
}
if($a || $b){
    echo "Test 2: Both a or b are true<br/>";
} else{
    echo "Test 2: Either a and b is false<br/>";
}
if($a or $b){
    echo "Test 3: Both a or b are true<br/>";
} else {
    echo "Test 3: Either a and b is false<br/>";
}
if($a and $b){
    echo "Test 4: Both a and b are true <br/>";
} else{
    echo "Test 4: Both a and b are false <br/>";
}
$a = 10;
$b = 0;
if ($a){
    echo "Test 5: a is true";
} else{
    echo "Test 5: a is false";
}
if ($b){
    echo "Test 6: b is true";
} else{
    echo "Test 6: b is false";
}
if (!$a){
    echo "Test 7: a is false";
} else{
    echo "Test 7: a is true";
}
if (!$b){
    echo "Test 8: b is false";
} else{
    echo "Test 8: b is true";
}
?>