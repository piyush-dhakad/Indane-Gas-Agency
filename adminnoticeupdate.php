<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";
if(isset($_POST["btn1"]))
{
extract($_POST);
$path="notice/default.jpg";
$qry="update noticeinfo set nottitle='$tntitle',notdetail='$tdetail',instruction='$tninstruct' where notid='$notid'";
if($_FILES["photo"]["error"]==0)
{
	$path="notice/".$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
	$qry="update noticeinfo set nottitle='$tntitle',notdetail='$tdetail',notpath='$path',instruction='$tninstruct' where notid='$notid'";
}

$rs=executequery($qry);
if($rs=="success")
{
	$status="Notice Information Updated Successful";
}
else
{
	$status="Sorry Record is not Update";
}
}

if(isset($_POST["btn2"]))
{
extract($_POST);

$qry="delete from noticeinfo where notid='$notid'";

$rs=executequery($qry);
if($rs=="success")
{
	$status="Notice Information Delete Successful";
}
else
{
	$status="Sorry Record is not Delete";
}
}

$notid=$_GET["nid"];
$nottitle="";
$notdetail="";
$notinstruct="";
$notpath="";

$qry="select *from noticeinfo where notid='$notid'";
$rs=readrecord($qry);

if(mysql_num_rows($rs)>0)
{
	$row=mysql_fetch_array($rs);
	$nottitle=$row["nottitle"];
	$notdetail=$row["notdetail"];
	$notinstruct=$row["instruction"];
	$notpath=$row["notpath"];
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
			
			<h3>Notice Update / Delete Setup</h3>
			
			<form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" >
			<input type="hidden" id="notid" name="notid" value="<?php echo $_GET["nid"]; ?>" />
			<table >
				<tr>
					<th>Notice Title</th>
					<td><input type="text" id="tntitle" name="tntitle" placeholder="Enter Notice Title!" value="<?php echo $nottitle; ?>" required/></td>
				</tr>
				
				
				<tr>
					<th>Notice Details</th>
					<td><textarea id="tdetail" name="tdetail" placeholder="Enter Notice Details!" rows="4" cols="30" required><?php echo $notdetail; ?></textarea></td>
				</tr>
				
				<tr>
					<th>Notice Image</th>
					<td><input type="file" id="photo" name="photo" accept="image/jpg" />
					<img src="<?php echo $notpath; ?>" style="height:50px;width:50px;" />
					</td>
				</tr
				
				<tr>
					<th>Notice Instruction</th>
					<td><input type="text" id="tninstruct" name="tninstruct" placeholder="Enter Notice Instrruction!" value="<?php echo $notinstruct; ?>" required/></td>
				</tr>
				
				
				<tr>
					<th colspan="2" >
						<input type="submit" id="btn1" name="btn1" value="Update Notice" />
						<input type="submit" id="btn2" name="btn2" value="Delete Notice" />
						<input type="reset" id="btn3" name="btn3" value="Cancel" />
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