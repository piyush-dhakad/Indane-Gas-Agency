<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php $status="";
$user=$_SESSION["user"];
$uid=$_SESSION["uid"];
$pwd="";
$email="";
$secquest="";
$secans="";
$qry="select * from usermaster where uid='$uid'";
$rs=readrecord($qry);
if(mysql_num_rows($rs)>0)
{
	$row=mysql_fetch_array($rs);
	$pwd=$row["pwd"];
	$email=$row["email"];
	$secquest=$row["secquest"];
	$secans=$row["secans"];
}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<title>Admin Home Page</title>
	<link rel="stylesheet" type="text/css" href="admincss.css" />
	<style type="text/css" >
		
	</style>
</head>
<body>
	<?php include("adminheader.php");  ?>
	
	<div class="bodydiv" >
		<div class="b1" >
			
			<h3>Profile Manger</h3>
			
			<form id="frm" name="frm" action="" method="post" >
			<table >
				<tr>
					<th>User Name</th>
					<td><input type="text" id="tuser" name="tuser" placeholder="Enter User Name!" value="<?php echo $user; ?>" /></td>
				</tr>
				
				<tr>
					<th>Password</th>
					<td><input type="text" id="tpwd" name="tpwd" placeholder="Enter Password!" value="<?php echo $pwd; ?>" /></td>
				</tr>
				
				<tr>
					<th>Email</th>
					<td><input type="text" id="temail" name="temail" placeholder="Enter Email Address!" value="<?php echo $email; ?>" /></td>
				</tr>
				
				<tr>
					<th>Security Question</th>
					<td><input type="text" id="tsecquest" name="tsecquest" placeholder="Enter Security Question!" value="<?php echo $secquest; ?>" /></td>
				</tr>
				
				<tr>
					<th>Security Answer</th>
					<td><input type="text" id="tsecans" name="tsecans" placeholder="Enter Security Answer!" value="<?php echo $secans; ?>" /></td>
				</tr>
				
				<tr>
					<th colspan="2" >
						<input type="submit" id="btn1" name="btn1" value="Submit" />
						<input type="reset" id="btn2" name="btn2" value="Cancel" />
					</th>
				</tr>
				
				<tr>
					<th colspan="2" ><?php echo $status; ?></th>
				</tr>
			</table>
			</form>			
			
		</div>
		<div class="b2" >
		
		</div>
	</div>

</body>
</html>