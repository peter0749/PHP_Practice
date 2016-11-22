<?php
header("content-type: text/html;charset=utf-8");
session_start();
require "Ch06-08.inc.php";
if(isset($_GET['replay'])){
		$_SESSION['level']=1;
		setcookie("level",1,time()+7*86400);
}
if(isset($_SESSION['level'])){
	$level=$_SESSION['level'];
}else{
	if(isset($_COOKIE['level'])){
		$level=$_SESSION['level']=$_COOKIE['level'];
	}
	else{
		$level=$_SESSION['level']=1;
		setcookie("level",1,time()+7*86400);
	}
}

if(isset($_POST['answer'])){
	if(get_magic_quotes_gpc()){
		$_POST['answer'] = stripslashes($_POST['answer']);
	}
	//echo $_POST['answer'];
	if($Q[$level]['answer']==$_POST['answer']){
		$_SESSION['level'] += 1;
		$level=$_SESSION['level'];
		setcookie("level",$level,time()+7*86400);
		$tryAgain = False;
		if($level == 4){
			unset($_SESSION['level']);
			setcookie("level",1,time()-10);
		}
	}else{
		$tryAgain=TRUE;
	}
}else{
	$tryAgain=False;
}
?>

<html>
<head><title>機智問答</title></head>

<?php
if($level<4){
	?>
		<table boarder="3">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<tr align="center">
		<td>Dear <?php echo $_SESSION['name'];?></td></tr>
		<tr align="center">
		<td><?php echo $Q[$level][$tryAgain];?></td></tr>
		<tr align="center">
		<td>第 <?php echo $level;?> 關</td></tr>
		<tr align="center">
		<td><?php echo $Q[$level]['question'];?></td></tr>
		<tr align="center">
		<td><input type="text" name="answer"></td></tr>
		<tr align="center">
		<td><input type="reset" value="改答案"></td></tr>
		<tr align="center">
		<td><input type="submit" value="送答案"></td></tr>
		<tr align="center">
		<td><a href="Ch06-08.php?replay=1">重新開始</a></td></tr>
		<tr align="center">
		<td><a href="Ch06-07.php">回會員頁面</a></td></tr>
		</form>
		</table>
		<?php
}
else{
	?>

		<table boarder="3">
		<tr align="center">
		<td><?php echo $Q[4].$_SESSION['name'];?></td></tr>
		<tr align="center">
		<td><a href="Ch06-08.php?replay=1">重新開始</a></td></tr>
		<tr align="center">
		<td><a href="Ch06-07.php">回會員頁面</a></td></tr>
		</table>
		<?php
}
?>
</html>
