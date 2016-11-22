<?php
header("content-type:text/html;charset=utf-8");
session_start();
$valid = array("name"=>"LKK", "pw"=>"lkk");

if(isset($_POST['tbxName']) and isset($_POST['tbxpw'])){
	if( $_POST['tbxName']==$valid['name'] and $_POST['tbxpw']==$valid['pw'] ){
		$_SESSION['name'] = $_POST['tbxName'];
		$_SESSION['setCounter']=TRUE;
		$_SESSION['logErr']=FALSE;
		header('Location: Ch06-07.php');
	}else{
		$_SESSION['logErr']=TRUE;
	}
}else{
	if(!isset($_SESSION['logErr'])){
		$_SESSION['logErr']=FALSE;
	}else{
		$_SESSION['logErr']=TRUE;
	}
}
?>

<html>
<head><title>Check Account/Password</title></head>
<body>
	<?php
	if($_SESSION['logErr']){
		echo "Wrong Account/Password!<br/><hr>";
	}else{
		echo "Please Enter Account name/Password<br/><hr>";
	}
	$_SESSION['logErr']=FALSE;
	?>

	<form action=<?php echo $_SERVER['PHP_SELF'];?> method="post">
		<p>
		Account: <input type="text" name="tbxName" value="LKK"><br/>
		Password <input type="password" name="tbxpw" value="lkk">
		</p>
		<input type="submit" value="送出">
		<input type="reset" value="重設">
	</form>
</body>
