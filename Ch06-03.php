<?php
header('content-type:text/html;charset=utf-8');
session_start();
$count=1;
if( !isset($_COOKIE['counter'])){
	setcookie('counter',1,time()+30*24*3600);
}
else{
	if( isset($_SESSION['entered'])){
		$count = $_COOKIE['counter'];
	}
	else{
		$count = $_COOKIE['counter']+1;
		setcookie('counter',$count,time()+30*24*3600);
	}
}
echo "這是您第" . $count . "次進入網站";
$_SESSION['entered'] = TRUE;
?>
