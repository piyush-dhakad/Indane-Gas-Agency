<?php include("myfunction.php");?>
<?php
$status="";
if(isset($_POST["btn"]))
{
	extract($_POST);
	$pid=1;//$_get["pid"];
	$uid_date=date("y-m-d");
	$qry="insert into customerbooking(Pid,Name,Age,Dob,Address,Gender,Postcode,Emali,indentiyinfo,status) values ('$pid','$tname','$tage','$tdob','$taddress','$gender','$tpostcode','$temali','$tidentityinfo','$status')";

	$rs=executequery($qry);
	if($rs=="success")
	{ 
       $status="customerbooking  process successful";
	}
	else
	{
		$status="error to customerbooking details";
	}
}
?>
<html>
<head>
<title>gas agency home page</title>
<link rel="stylesheet" type="text/css" href="style.css"/>
<style type="text/css">
</style>
</head>
<body>
<h2>customer booking page</h2>
<form id="frm" name="frm" action="" method="post">
<table height="300px" width="70%">
<tr>
<th>customer name:</th>
<td><input type="text" id="tname" name="tname" placeholder="enter
Customer name!" required/></td>
</tr>
</tr>
<tr>
<th>customer age:</th>
<td><input type="text" id="tage" name="tage" placeholder="enter
Customer age!" required/></td>
</tr>
<tr>
<th> birth date(dob):</th>
<td><input type="text" id="tdob" name="tdob" placeholder="enter
Customer birth date!" required/></td>
</tr>
<tr>
<th>select gender</th>
<td>
<select id="gender" name="gender">
<option value="male">male</option>
<option value="female">famale</option>
</select>
</td>
</tr>
<tr>
<th>postcode code</th>
<td><input type="text" id="tpostcode" name="tpostcode" placeholder="enter
postcode!" required/></td>
</tr>
<tr>
<th>address</th>
<td><input type="text" id="taddress" name="taddress" placeholder="enter
address!" required/></td>
</tr>
<tr>
<th>mobile number:</th>
<td><input type="text" id="tmobile" name="tmobile" placeholder="enter
mobile number!" required/></td>
</tr>
<tr>
<th>emali address:</th>
<td><input type="text" id="temali" name="temali" placeholder="enter
Customer emali address!" required/></td>
</tr>
<tr>
<th>identityinfo number:</th>
<td><input type="text" id="tidentityinfo" name="tidentityinfo" placeholder="enter
Customer indentityinfo!" required/></td>
</tr>
<tr>
<td colspan="2" align="center">
<input type="submit" id="btn" name="btn" value="submit"/>
</td>
</tr>
</table>
</form>
<?php echo $status;?>
</body>
</html>






