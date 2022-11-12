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
		<center>
		<h3>Feedback List Panel</h3>
		<form id="frm" name="frm" action="" method="post" >
		Search : <input type="text" id="tsrch" name="tsrch" placeholder="Search Text Type Here" />
		<input type="submit" id="btn1" name="btn1" value="Submit" />
		</form><br /><br />
		
<?php
$search="";
if(isset($_POST["btn1"]))
{
	$search=$_POST["tsrch"];
}

$qry="select qid as 'Query No',qdate as 'Query Date',pname as 'Query Person',email as 'Email Address',Subject,Message from queryinfo where pname like '%$search%' or email like '%$search%' order by qid desc";
echo tableinfo($qry);
?>

		
</center>
</div>

</body>
</html>