<?php include("functioninfo.php"); ?>
<?php
session_start();
$status="";
if(isset($_POST["btn1"]))
{
	extract($_POST);
	$qry="select * from usermaster where email='$temail' and secquest='$tsecquest' and secans='$tsecans'";
	$rs=readrecord($qry);	
	if(mysql_num_rows($rs)>0)
	{			
		$row=mysql_fetch_array($rs);
		
		$status.="<h3>User Name is : $row[uname]</h3>";
		$status.="<h3>Password is : $row[pwd]</h3>";
		$status.="<a href='adminlogin.php' >Back to Login</a>";
	}
	else
	{
		echo "<h3>Invalid Authentication</h3>";
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
		<h2>Forget Password Panel</h2>
		<form id="frm" name="frm" action="" method="post" >
		<table >
		<tr>	
			<th>Email :</th>
			<td><input type="text" id="temail" name="temail" placeholder="Enter Email" required/></td>
		</tr>
		
		<tr>	
			<th>Security Question :</th>
			<td><input type="text" id="tsecquest" name="tsecquest" placeholder="Enter Security Question" required/></td>
		</tr>
		
		<tr>	
			<th>Security Answer :</th>
			<td><input type="text" id="tsecans" name="tsecans" placeholder="Enter Security Answer" required/></td>
		</tr>
		
		<tr>
			<th colspan="2" >
				<input type="submit" class="btn" id="btn1" name="btn1" value="Forget" />								
			</th>
		</tr>
		
		<tr>
			<th colspan="2" ></th>
		</tr>
		</table>
		</form>
		<?php echo $status; ?>
		</div>		
	</div>
</center>
</body>
</html>