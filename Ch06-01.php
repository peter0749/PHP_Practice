<?php
header("content-type:text/html;charset=utf-8");

$count = 1;
if( !isset($_COOKIE['counter']) ){
	setcookie("counter",1,time()+30*24*3600);
}
else{
	$count = $_COOKIE['counter']+1;
	setcookie("counter",$count,time()+30*24*3600);
}

echo "這是您第 $count 次進入本站";
?>
