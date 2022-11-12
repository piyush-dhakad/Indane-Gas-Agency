      <?php
  
	$user=$_POST['username'];
	$pwd=$_POST['password'];
	$query="select*from registration where Email='$user' and Password='$pwd'";
	$data=mysqli_query($conn,$query);
	$total=mysqli_num_rows($data);
	if($total==1)
	{
		$_SESSION['user_name']=$user;
		header("location:index.php");
	}
	else
	{
		echo "<script>alert('incorrect username or password');</script>";
	}
}
?>