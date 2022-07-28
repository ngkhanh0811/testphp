<?php
//multiply a value by 20 and return it to the caller
function multiply($value){
    $value = $value * 20;
    return $value;
}
$retval = multiply(10);
print "Return value is $retval\n";
?>