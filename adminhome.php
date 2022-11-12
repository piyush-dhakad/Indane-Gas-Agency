<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION["uid"]))
{	
header("location:adminlogin.php");	
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
			<?php header("location:adminprofile.php"); ?>
		</div>
		<div class="b2" >
		
		</div>
	</div>

</body>
</html>