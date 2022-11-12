<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";
if(isset($_POST["btn1"]))
{
extract($_POST);
$setdate=date('Y-m-d');
$path="";
$qry="update galleryinfo set gtitle='$tgname',gdescription='$tdescript' where galid='$galleryid'";

if($_FILES["photo"]["error"]==0)
{
	$path="gallery/".$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
$qry="update galleryinfo set gtitle='$tgname',gdescription='$tdescript' ,gpath='$path' where galid='$galleryid'";
}

$rs=executequery($qry);
if($rs=="success")
{
	$status="Gallery Updated Successful";
}
else
{
	$status="Sorry Record is not Updated";
}
}

if(isset($_POST["btn2"]))
{
extract($_POST);
$qry="delete from galleryinfo where galid='$galleryid'";
$rs=executequery($qry);
if($rs=="success")
{
	$status="Gallery Deleted Successful";
}
else
{
	$status="Sorry Deleted is not Updated";
}
}


$galid=$_GET["gid"];
$title="";
$description="";
$photo="";

$qry="select * from galleryinfo where galid='$galid'";
$rs=readrecord($qry);
if(mysql_num_rows($rs)>0)
{
	$row=mysql_fetch_array($rs);
	$title=$row["gtitle"];
	$description=$row["gdescription"];
	$photo=$row["gpath"];
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
			
			<h3>Gallery Update / Delete Panel</h3>
			
			<form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" >
			<input type="hidden" id="galleryid" name="galleryid" value="<?php echo $_GET["gid"]; ?>" />
			<table >
				<tr>
					<th>Gallery Title</th>
					<td><input type="text" id="tgname" name="tgname" placeholder="Enter Gallery Title!" value="<?php echo $title; ?>" required/></td>
				</tr>
				
				
				<tr>
					<th>Gallery Description</th>
					<td><textarea id="tdescript" name="tdescript" placeholder="Enter Description!" rows="4" cols="30" required><?php echo $description; ?></textarea></td>
				</tr>
				
				<tr>
					<th>Gallery Photo</th>
					<td><input type="file" id="photo" name="photo" accept="image/jpg" />
					<img src="<?php echo $photo; ?>" alt="abc" style="height:50px;width:50px;">
					</td>
				</tr
				
				<tr>
					<th colspan="2" >
						<input type="submit" id="btn1" name="btn1" value="Update Gallery" />
						<input type="submit" id="btn2" name="btn2" value="Delete Gallery" />
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
			<h2>Gallery List</h2>
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
				$qry="select galid as 'Gallery No',gtitle as 'Gallery Title' from galleryinfo where gtitle like '%$srch' order by  galid desc limit 20";
				echo tableinfo_select($qry,"admingalleryupdate.php","gid","Update",0);
			?>
		</div>
	</div>

</body>
</html>