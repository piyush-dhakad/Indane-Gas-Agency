<?php include("functioninfo.php"); ?>
<?php
session_start();
$status="";
if(isset($_POST["btn1"]))
{
	extract($_POST);
	$qry="select * from usermaster where uname='$tuser' and pwd='$tpwd'";
	$rs=readrecord($qry);	
	if(mysql_num_rows($rs)>0)
	{
		$_SESSION["user"]=$tuser;
		$row=mysql_fetch_array($rs);
		$_SESSION['uid']=$row[0];
		header("location:adminhome.php");
	}
	else
	{
		echo "<h3>Sorry Record not found<br />Try Again</h3>";
	}
}
?>
<html>
<head>
	<title>Admin Login Panel</title>
	<style type="text/css" >
	.logininfo
	{
		width:50%;height:500px;		
	}
	
	.clsimg
	{
		width:50%;height:220px;				
	}
	.clsimage
	{
		width:100%;height:100%;		
	}
	
	h2
	{
		margin:3px;font-size:40px;color:#333333;		
	}
	
	table
	{
		height:220px;width:100%;		
	}
	
	.btn
	{
		height:30px;width:120px;
	}
	
	</style>
</head>
<body>
<center>
<br />
	<div class="logininfo" >
		<div class="clsimg" >
		<img src="photo/indane.jpg" alt="gas" class="clsimage" />
		</div>
		
		<div class="clslogin" >
		<h2>Login Panel</h2>
		<form id="frm" name="frm" action="" method="post" >
		<table>
		<tr>	
			<th>User Name :</th>
			<td><input type="text" id="tuser" name="tuser" placeholder="Enter User Name" required/></td>
		</tr>
		
		<tr>	
			<th>Password :</th>
			<td><input type="password" id="tpwd" name="tpwd" placeholder="Enter Password" required/></td>
		</tr>
		
		<tr>
			<th colspan="2" >
				<input type="submit" class="btn" id="btn1" name="btn1" value="Login Now" />
				<input type="reset" class="btn" id="btn2" name="btn2" value="Cancel" />
				<a href="adminforget.php" >Forget Click Here</a>
			</th>
		</tr>
		
		<tr>
			<th colspan="2" ><?php echo $status; ?></th>
		</tr>
		</table>
		</form>
		</div>		
	</div>
</center>
</body>
</html>