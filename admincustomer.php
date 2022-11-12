<?php include("functioninfo.php"); ?>
<?php session_start(); ?>
<?php
$status="";
if(isset($_POST["btn1"]))
{
extract($_POST);
$regdate=date('Y-m-d');

$qry="insert into customer (cusno,cusname,gender,dob,identityinfo,address,postcode,city,mobile,email,username,pwd,registerdate,catid,status) values ('$tcno','$tcname','$gender','$tdob','$tidentity','$taddress','$tpostcode','$tcity','$tmobile','$temail','$tcno','$tdob','$regdate','$catname','Active')";

$rs=executequery($qry);
if($rs=="success")
{
	$status="Customer Inserted Successful";
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
			
			<h3>Customer Setup</h3>
			
			<form id="frm" name="frm" action="" method="post" >
			<table >
				<tr>
					<th>Customer Reg. No</th>
					<td><input type="text" id="tcno" name="tcno" placeholder="Enter Customer Reg. No!" required/></td>
				</tr>
				
				<tr>
					<th>Customer Name</th>
					<td><input type="text" id="tcname" name="tcname" placeholder="Enter Customer Reg. No!" required/></td>
				</tr>
				
				<tr>
					<th>Gender</th>
					<td>
					<select id="gender" name="gender" >
					<option value="Male" >Male</option>
					<option value="Female" >Female</option>
					</select>
					</td>
				</tr>
				<tr>
					<th>DOB</th>
					<td><input type="text" id="tdob" name="tdob" placeholder="Enter Birth Date!" required/></td>
				</tr>
				
				<tr>
					<th>Customer Address</th>
					<td><textarea id="taddress" name="taddress" placeholder="Enter Address!" rows="4" cols="30" required></textarea></td>
				</tr>
				
				<tr>
					<th>Post Code</th>
					<td><input type="text" id="tpostcode" name="tpostcode" placeholder="Enter Post Code!" required/></td>
				</tr>
				
				<tr>
					<th>City Name</th>
					<td><input type="text" id="tcity" name="tcity" placeholder="Enter City Name!" required/></td>
				</tr>
				
				<tr>
					<th>Identity No (PAN/Aadhar/Voter Id)</th>
					<td><input type="text" id="tidentity" name="tidentity" placeholder="Enter Identity No!" required/></td>
				</tr>
				
				<tr>
					<th>Mobile Number</th>
					<td><input type="text" id="tmobile" name="tmobile" placeholder="Enter Mobile!" required/></td>
				</tr>
				
				<tr>
					<th>Email Address</th>
					<td><input type="text" id="temail" name="temail" placeholder="Enter Email Address!" required/></td>
				</tr>
				
				<tr>
					<th>Gas Plan Category</th>
					<td>
					<select id="catname" name="catname">
					<?php echo getSelect("select * from category order by catname"); ?>
					</select>
					</td>
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