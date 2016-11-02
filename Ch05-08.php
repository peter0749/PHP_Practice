<?php
header('content-type:text/html;charset=utf-8');
$doa = 0;
if ( !ereg('^[0-9]{2}-[0-9]{8}$',$_POST[telephone]) ){
	echo 'Wrong telephone format!<br/>';
	$doa = 1;
}
if ( !eregi('^[a-z]{1}[1-2]{1}[0-9]{8}$',$_POST[id]) ){
	echo 'Wrong ID format!<br/>';
	$doa = 1;
}
if($doa) die('Please fill-in the form');
echo $_POST[telephone] . '<br/>', $_POST[id];
?>
