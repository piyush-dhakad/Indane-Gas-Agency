<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION["uid"]))
{	
header("location:adminlogin.php");	
}
$status="";
if(isset($_POST["btn1"]))
{
	extract($_POST);
	$qry="update bookinginfo set delstatus='$tdelstatus',paystatus='$paystatus' where bookid='$hidid'";
	
	$rs=executequery($qry);
	//if($rs=="success")
	//{
	//	
	//}
	header("location:adminbooklist.php");
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
			<center>
			<h2>Update Booking Status</h2>
			<form id="frm" name="frm" action="" method="post" >
			<input type="hidden" id="hidid" name="hidid" value="<?php echo $_GET["bookid"]; ?>" />
			Delivery Status<br />
			<input type="text" id="tdelstatus" name="tdelstatus" placeholder="Enter Delivery Status!" required/>
			<br /><br />
			Payment Status<br />
			<select id="paystatus" name="paystatus" >
			<option value="Paid" >Paid</option>
			<option value="Unpaid" >Unpaid</option>
			</select>
			<br /><br />
			<input type="submit" id="btn1" name="btn1" value="Change Status" />
			</form>
			</center>
		</div>
		<div class="b2" >
		
		</div>
	</div>

</body>
</html>