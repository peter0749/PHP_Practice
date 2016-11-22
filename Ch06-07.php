<?php
header("content-type:text/html;charset=utf-8");
session_start();
$count=1;

if( !isset($_COOKIE['myCounter']) ){
	setcookie("myCounter", 1, time()+30*24*3600);
	$_SESSION['setCounter']=FALSE;
}else{
	if($_SESSION['setCounter']==TRUE){
		$count = $_COOKIE['myCounter'] + 1;
		setcookie("myCounter", $count, time()+30*24*3600);
		$_SESSION['setCounter']=FALSE;
	}else{
		$count = $_COOKIE['myCounter'];
	}
}
?>

<html>
<head><title>Member Area</title></head>
<body>
	歡迎，<?php echo $_SESSION['name'];?>
	第 <?php echo $count;?> 次光臨<br/>
	以下是一個推薦小遊戲<hr/>
	<a href="Ch06-08.php">機智問答</a>
</body>
</html>
