<?php
header('content-type:text/html;charset=utf-8');
function square(&$x){
	$x = $x * $x;
	echo 'X in function: ' . $x;
}

$x=3;
square($x);
echo '<br/>X in global: '.$x;

?>
