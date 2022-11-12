<?php include("functioninfo.php"); ?>
<html>
<head>
<title>Page Example</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<style type="text/css" >
#centerdiv
{
	overflow:auto;	
}
.clsgallerydiv
{
	height:250px;width:90%;	border:solid 1px #cccccc;margin-top:4px;
}
.clsgalleryimg
{
	height:100px;width:150px;
}

.clsgalleryhead
{
	margin:4px;font-size:22px;
}
.clsgallerypara
{	
	margin:4px;font-size:16px;
}
</style>
</head>
<body>
<div id="topdiv" >
	<h1>Indane Gas Agency</h1>
</div>

<div id="menudiv" >
<a href="index.php" ><div id="m1">Home</div></a>
<a href="about.php" ><div id="m2">About</div></a>
<a href="gasplan.php" ><div id="m3">Gas Plan</div></a>
<a href="gallery.php" ><div id="m4">Gallery</div></a>
<a href="customerlogin.php" ><div id="m4">Customer Login</div></a>
<a href="contact.php" ><div id="m5">Contact</div></a>
</div>

<div id="headerdiv" >
<img src="photo/indaneheader.jpg" id="clsimg" />
</div>

<div id="marqueediv" >
<marquee>
Welcome to Ujjain Indane Gas Agency Website. This is Online Portal Website for Support and Online Booking
</marquee>
</div>

<div id="bodydiv" >
<div id="leftdiv" >
<center>
<h3>Our Services</h3>
<h4><a href="#" >Home Delievery</a></h4>
<h4><a href="#" >Online Booking</a></h4>
<h4><a href="#" >24 Hour Support</a></h4>
<h4><a href="#" >Online Help</a></h4>
<h4><a href="#" >Suggestion</a></h4>
<br />
<h3>Notification</h3>
<img src="photo/indane.jpg" id="sidebarimg" />
<h4>Plan Details</h4>
</center>
</div>
<div id="centerdiv" >
<center>
<h2>Gallery Panel</h2>
<?php
$qry="select * from galleryinfo order by galid desc";
$rs=readrecord($qry);
if(mysql_num_rows($rs)>0)
{
	$gallery="";
	while($row=mysql_fetch_array($rs))
	{
		$gallery.="<div class='clsgallerydiv' ><center><br />";
		$gallery.="<img src='$row[gpath]' class='clsgalleryimg' />";		
		$gallery.="<h3 class='clsgalleryhead' >$row[gtitle]</h3>";
		$gallery.="<p class='clsgallerypara' >$row[gdescription]</p>";
		$gallery.="</center></div>";
	}
	echo $gallery;
}
else
{
	echo "<h3>Sorry Gallery Details is not found</h3>";
}
?>

</center>

</div>
<div id="rightdiv" >
<center>
<h3>Person Plan 14 KG</h3>
<img src="photo/personal.jpg" id="sidebarimg" />
<h3>Commercial Plan 19 KG</h3>
<img src="photo/commercial.jpg" id="sidebarimg" />
<h3>IndustrialPlan 47.5 KG</h3>
<img src="photo/industrial.jpg" id="sidebarimg" />
</center>
</div>
</div>

<div id="footerdiv" >
<div id="f1" ><br />
	<img src="photo/logo.png" style="width:80%;height:80%;border-radius:10% 10%;" />
</div>
<div id="f2" ><br />
	<a href="index.php" >Home Page</a><br /><br />
	<a href="about.php" >About Us</a><br /><br />
	<a href="booking.php" >Booking</a><br /><br />
	<a href="gallery.php" >Gallery</a><br /><br />
</div>
<div id="f3" ><br />
	<a href="terms.php" >Term & Condition</a><br /><br />
	<a href="suggestion.php" >Suggestion</a><br /><br />
	<a href="feedbackinfo.php" >Feedback</a><br /><br />
	<a href="ourrules.php" >Our Rules</a><br /><br />
</div>
<div id="f4" >
<br />
	<img src="photo/logo.png" style="width:80%;height:80%;border-radius:10% 10%;" />
</div>
</div>

<div id="developerdiv" >
<center>Developed By Deepak Nahar from MIT</center>
</div>

</body>
</html>