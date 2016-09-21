<html>
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<style>
		.text_title{
			    font-weight:bold;
			    font-size:18px;
				}
		font.req{
			    color:red;
				}
	</style>
	<title>PHP Form Validation</title>
</head>
<body>
	<font class="text_title">PHP Form Validation</font><br/>
	<font class="req">*required filed</font><br/>
	<!--form method="post" action="phpformvalidation.php"-->
	<form method="post" name="membership" action="<?php echo $_SERVER['PHP_SELF']?>">
		Name:<input type="text" name="u_name" /><font class="req">*</font><br/>
		E-mail:<input type="text" name="u_email" /><font class="req">*</font><br/>
		Web-site:<input type"text" name="u_site" /><br/>
		Comment:<textarea rows="10" cols="50" name="u_comment">Enter anything...</textarea><br/>
		Gender:<input type="radio" name="gender" value="female"/>female
			<input type="radio" name="gender" value="male" />male<font class="req">*</font><br/>
		<input type="Submit" value="Submit"/><br/>
	</form>
	<font class="text_title">Your Input:</font><br/>
	<?php
		foreach($_POST as $name => $value)
		{
			echo $name . ":" . $value . "</br>";
		}
	?>
</body>

</html>
