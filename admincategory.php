<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";
if(isset($_POST["btn1"]))
{
extract($_POST);
$qry="insert into category (catname,catdetail,cylinderprice,updatedate) values ('$tcname','$tdetail','$tcprice','$tupdate')";
	
$rs=executequery($qry);
if($rs=="success")
{
	$status="Record Inserted Successful";
}
else
{
	$status="Sorry Record is not Insert";
}
}
?>
<html>
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<title>Admin Category Page</title>
	<link rel="stylesheet" type="text/css" href="admincss.css" />
	<style type="text/css" >
		
	</style>
</head>
<body>
	<?php include("adminheader.php");  ?>
	
	<div class="bodydiv" >
		<div class="b1" >
			
			<h3>Category Setup</h3>
			
			<form id="frm" name="frm" action="" method="post" >
			<table >
				<tr>
					<th>Category Name</th>
					<td><input type="text" id="tcname" name="tcname" placeholder="Enter Category Name!" required/></td>
				</tr>
				
				
				<tr>
					<th>Category Details</th>
					<td><textarea id="tdetail" name="tdetail" placeholder="Enter Detail!" rows="4" cols="30" required></textarea></td>
				</tr>
				
				<tr>
					<th>Cylinder Price</th>
					<td><input type="text" id="tcprice" name="tcprice" placeholder="Enter Cylinder Price!" required/></td>
				</tr>
				
				<tr>
					<th>Price Update Date</th>
					<td><input type="text" id="tupdate" name="tupdate" placeholder="Enter Update Priced Date!" required/></td>
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
			<h2>Category List</h2>
			<form id="f1" name="f1" action="" method="post" >
			Search : 
			<input type="text"  id="tsearch" name="tsearch" />
			<input type="submit" id="btnsearch" name="btnsearch" value="Search" />
			</form>
			<?php
				$srch="";
				if(isset($_POST["btnsearch"]))
				{					
					$srch=$_POST["tsearch"];					
				}
				$qry="select catid as 'Category Id',catname as 'Category Name',catdetail as 'Details' from category where catname like '%$srch'";
				echo tableinfo_select($qry,"admincatupdate.php","catid","Update",0);
			?>
		</div>
	</div>

</body>
</html>