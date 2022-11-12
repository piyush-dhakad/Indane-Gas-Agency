<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";
if(isset($_POST["btn1"]))
{
extract($_POST);
$regdate=date('Y-m-d');

$qry="update customer set cusname='$tcname',gender='$gender',dob='$tdob',identityinfo='$tidentity',address='$taddress',postcode='$tpostcode',city='$tcity',mobile='$tmobile',email='$temail',username='$tdob',pwd='$tdob',catid='$catname',status='$actstatus' where cusno='$tcno'";

$rs=executequery($qry);
if($rs=="success")
{
	$status="Customer Updated Successful";
}
else
{
	$status="Sorry Record is not Update";
}
}

if(isset($_POST["btn2"]))
{
extract($_POST);

$qry="delete from customer where cusno='$tcno'";

$rs=executequery($qry);
if($rs=="success")
{
	$status="Customer Deleted Successful";
}
else
{
	$status="Sorry Record is not Deleted";
}
}

$cno=$_GET["cid"];
$cname="";
$cgender="";
$cdob="";
$cidentity="";
$caddress="";
$cpostcode="";
$cmobile="";
$cemail="";
$ccity="";
$ccatid="";
$cstatus="";

			
$qq="select * from customer where cusno='$cno'";
$rs=readrecord($qq);

if(mysql_num_rows($rs))
{	
$row=mysql_fetch_array($rs);
$cname=$row["cusname"];
$cgender=$row["gender"];
$cdob=$row["dob"];
$cidentity=$row["identityinfo"];
$caddress=$row["address"];
$cpostcode=$row["postcode"];
$cmobile=$row["mobile"];
$cemail=$row["email"];
$ccity=$row["city"];
$ccatid=$row["catid"];
$cstatus=$row["status"];
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
						
			
			<h3>Customer Update Panel</h3>
			
			<form id="frm" name="frm" action="" method="post" >

			<table >
				<tr>
					<th>Customer Reg. No</th>
					<td><input type="text" id="tcno" name="tcno" placeholder="Enter Customer Reg. No!" readonly="true" value="<?php echo $cno; ?>" required/></td>
				</tr>
				
				<tr>
					<th>Customer Name</th>
					<td><input type="text" id="tcname" name="tcname" placeholder="Enter Customer Reg. No!" value="<?php echo $cname; ?>" required/></td>
				</tr>
				
				<tr>
					<th>Gender</th>
					<td>
					<select id="gender" name="gender" >
					<option <?php if($cgender=="Male"){echo "selected=selected";} ?> value="Male" >Male</option>
					<option <?php if($cgender=="Female"){echo "selected=selected";} ?> value="Female" >Female</option>
					</select>
					</td>
				</tr>
				<tr>
					<th>DOB</th>
					<td><input type="text" id="tdob" name="tdob" value="<?php echo $cdob; ?>" placeholder="Enter Birth Date!" required/></td>
				</tr>
				
				<tr>
					<th>Customer Address</th>
					<td><textarea id="taddress" name="taddress" placeholder="Enter Address!" rows="4" cols="30" required><?php echo $caddress; ?></textarea></td>
				</tr>
				
				<tr>
					<th>Post Code</th>
					<td><input type="text" id="tpostcode" name="tpostcode" value="<?php echo $cpostcode; ?>" placeholder="Enter Post Code!" required/></td>
				</tr>
				
				<tr>
					<th>City Name</th>
					<td><input type="text" id="tcity" name="tcity" value="<?php echo $ccity; ?>" placeholder="Enter City Name!" required/></td>
				</tr>
				
				<tr>
					<th>Identity No (PAN/Aadhar/Voter Id)</th>
					<td><input type="text" id="tidentity" name="tidentity" placeholder="Enter Identity No!" value="<?php echo $cidentity; ?>" required/></td>
				</tr>
				
				<tr>
					<th>Mobile Number</th>
					<td><input type="text" id="tmobile" name="tmobile" placeholder="Enter Mobile!" value="<?php echo $cmobile; ?>" required/></td>
				</tr>
				
				<tr>
					<th>Email Address</th>
					<td><input type="text" id="temail" name="temail" placeholder="Enter Email Address!" value="<?php echo $cemail; ?>"  required/></td>
				</tr>
				
				<tr>
					<th>Gas Plan Category</th>
					<td>
					<select id="catname" name="catname">
					<?php echo getSelect("select * from category order by catname"); ?>
					<?php echo getSelectOption("select * from category where catid='$ccatid'"); ?>
					</select>
					</td>
				</tr>
				
				<tr>
					<th>Active Status</th>
					<td>
					<select id="actstatus" name="actstatus">
					
					<option value="Active" <?php if($cstatus=="Active"){ echo "selected=selected";} ?> >Active</option>
					<option value="Deactive" <?php if($cstatus=="Deactive"){ echo "selected=selected";} ?> >Deactive</option>
					</select>
					</td>
				</tr>
				
				<tr>
					<th colspan="2" >
						<input type="submit" id="btn1" name="btn1" value="Update Customer" />
						<input type="submit" id="btn2" name="btn2" value="Delete Customer" />
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
			<h2>Customer List</h2>
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
				$qry="select cusno,cusname,address,mobile,status from customer where cusno like '%$srch%' or cusname like '%$srch'";
				
				echo tableinfo_select($qry,"admincusupdate.php","cid","Update",0);
			?>
		</div>
	</div>

</body>
</html>