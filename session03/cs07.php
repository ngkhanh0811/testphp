<?php
header ('content-type: text/plain');
$name = "William";
$str = '$name is displayed.\\n';
echo ($str);
echo "\n";
$str = "$name is a displayed\n" . "goodbye.";
echo ($str);
?>