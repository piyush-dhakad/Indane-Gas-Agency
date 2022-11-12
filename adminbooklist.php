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
		<h3>Customer Booking List Panel</h3>
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

$qry="select bookid as 'Book No',bookdate as 'Book Date',cusno as 'Customer No',cusname as 'Customer Name',address 'Delivery Address',postcode as 'Post Code',Mobile,gasplan as 'Your Gas Plan',cprice as 'Cylinder Price',paymode as 'Payment Mode',bankname as 'Bank Name',deldate as 'Delivery Date',delstatus as 'Delivery Status',paystatus as 'Paid / Unpaid' from bookinginfo where cusno='$search' or bookdate='$search' or cusname like '%$search%' order by bookid desc";
echo tableinfo_select($qry,"adminbookstatus.php","bookid","Change Status",0);
?>

		
</center>
</div>

</body>
</html>