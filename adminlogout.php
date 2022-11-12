<?php
session_start();

if(!isset($_SESSION["uid"]))
{	
header("location:adminlogin.php");	
}

unset($_SESSION["user"]);
unset($_SESSION["uid"]);

header("location:adminlogin.php");

?>