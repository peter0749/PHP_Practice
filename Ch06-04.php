<?php
header('content-type:text/html;charset=utf-8');
session_start();
date_default_timezone_set('Asia/Taipei');
if(!isset($_SESSION['enterTIME'])){
	$_SESSION['enterTIME'] = time();
}
?>

<html>
<head></head>
<body>
	<p>本次進站時間
	<?php echo date("H 時 i 分 s 秒",$_SESSION['enterTIME']); ?>
	</p>
	<a href="Ch06-05.php">Another Webpage</a>
</body>
</html>
