<?php
header("content-type:text/html;charset=utf-8");
session_start();
$duration=0;
if(isset($_SESSION['enterTIME'])){
	$duration = time()-$_SESSION['enterTIME'];
}
?>

<html>
<head></head>
<body>
	逗留：
	<?php echo date("H 時 i 分 s 秒",$duration);?><br/>
</body>
</html>
