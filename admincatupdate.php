<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";

if(isset($_POST["btn1"]))
{
extract($_POST);
$qry="update category set catname='$tcname',catdetail='$tdetail',cylinderprice='$tcprice',updatedate='$tupdate' where catid='$cid'";
	
$rs=executequery($qry);
if($rs=="success")
{
	$status="Record Updated Successful";
	$status.="<br /><a href='admincategory.php' >Add New Category</a>";
}
else
{
	$status="Sorry Record is not Updated";
}
}

$catid="";
$catname="";
$catdetail="";
$cylinderprice="";
$updatedate="";
if(isset($_GET["catid"]))
{
	$catid=$_GET["catid"];
	$qry="select * from category where catid='$catid'";
	$rs=readrecord($qry);
	if(mysql_num_rows($rs)>0)
	{
		$row=mysql_fetch_array($rs);
		$catname=$row['catname'];
		$catdetail=$row['catdetail'];
		$cylinderprice=$row['cylinderprice'];
		$updatedate=$row['updatedate'];
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
			
			<h3>Category Manage</h3>			
			<form id="frm" name="frm" action="" method="post" >
			<input type="hidden"  id="cid" name="cid" value="<?php echo $catid; ?>" />
			<table >
				<tr>
					<th>Category Name</th>
					<td><input type="text" id="tcname" name="tcname" placeholder="Enter Category Name!" value="<?php echo $catname; ?>" required/></td>
				</tr>			
				
				<tr>
					<th>Category Details</th>
					<td><textarea id="tdetail" name="tdetail" placeholder="Enter Detail!" rows="4" cols="30" required><?php echo $catdetail; ?></textarea></td>
				</tr>
				
				<tr>
					<th>Cylinder Price</th>
					<td><input type="text" id="tcprice" name="tcprice" placeholder="Enter Cylinder Price!" value="<?php echo $cylinderprice; ?>" required/></td>
				</tr>
				
				<tr>
					<th>Price Update Date</th>
					<td><input type="text" id="tupdate" name="tupdate" placeholder="Enter Update Priced Date!" value="<?php echo $updatedate; ?>" required/></td>
				</tr>
				
				<tr>
					<th colspan="2" >
						<input type="submit" id="btn1" name="btn1" value="Update" />
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