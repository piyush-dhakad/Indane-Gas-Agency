<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";
if(isset($_POST["btn1"]))
{
extract($_POST);
$setdate=date('Y-m-d');
$path="gallery/default.jpg";

if($_FILES["photo"]["error"]==0)
{
	$path="gallery/".$_FILES["photo"]["name"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],$path);
}

$qry="insert into galleryinfo (gtitle,gdescription,gpath,setupdate) values ('$tgname','$tdescript','$path','$setdate')";
	
$rs=executequery($qry);
if($rs=="success")
{
	$status="Gallery Inserted Successful";
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
			
			<h3>Gallery Setup</h3>
			
			<form id="frm" name="frm" action="" method="post" enctype="multipart/form-data" >
			<table >
				<tr>
					<th>Gallery Title</th>
					<td><input type="text" id="tgname" name="tgname" placeholder="Enter Gallery Title!" required/></td>
				</tr>
				
				
				<tr>
					<th>Gallery Description</th>
					<td><textarea id="tdescript" name="tdescript" placeholder="Enter Description!" rows="4" cols="30" required></textarea></td>
				</tr>
				
				<tr>
					<th>Gallery Photo</th>
					<td><input type="file" id="photo" name="photo" accept="image/jpg" /></td>
				</tr
				
				<tr>
					<th colspan="2" >
						<input type="submit" id="btn1" name="btn1" value="Add Gallery" />
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