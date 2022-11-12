<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";
if(isset($_POST["btn1"]))
{
extract($_POST);
$setdate=date('Y-m-d');
$path="notice/default.jpg";

if($_FILES["photo"]["error"]==0)
{
	$path="notice/".$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
}

$qry="insert into noticeinfo (nottitle,notdetail,notpath,instruction,notdate) values ('$tntitle','$tdetail','$path','$tninstruct','$setdate')";
	
$rs=executequery($qry);
if($rs=="success")
{
	$status="Notice Information Inserted Successful";
}
else
{
	$status="Sorry Record is not Inserted";
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
			
			<h3>Notice Information Setup</h3>
			
			<form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" >
			<table >
				<tr>
					<th>Notice Title</th>
					<td><input type="text" id="tntitle" name="tntitle" placeholder="Enter Notice Title!" required/></td>
				</tr>
				
				
				<tr>
					<th>Notice Details</th>
					<td><textarea id="tdetail" name="tdetail" placeholder="Enter Notice Details!" rows="4" cols="30" required></textarea></td>
				</tr>
				
				<tr>
					<th>Notice Image</th>
					<td><input type="file" id="photo" name="photo" accept="image/jpg" /></td>
				</tr
				
				<tr>
					<th>Notice Instruction</th>
					<td><input type="text" id="tninstruct" name="tninstruct" placeholder="Enter Notice Instrruction!" required/></td>
				</tr>
				
				
				<tr>
					<th colspan="2" >
						<input type="submit" id="btn1" name="btn1" value="Add Notice" />
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
			<h2>Notice Information List</h2>
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
				$qry="select notid as 'Notice No',nottitle as 'Notice Title',notdate as 'Notice Date' from noticeinfo where nottitle like '%$srch' order by  notid desc limit 20";
				echo tableinfo_select($qry,"adminnoticeupdate.php","nid","Update",0);
			?>
		</div>
	</div>

</body>
</html>