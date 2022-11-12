<?php

function connectinfo()
{
	$con=mysql_connect("localhost","root","");	
	mysql_select_db("jobsite2018",$con);	
	return $con;
}

function execute_query($qry)// insert update delete create truncate
{
	$rs=mysql_query($qry,connectinfo());	
	if(!$rs)
	{
		return "Error : ".mysql_error();
	}
	else
	{
		return "true";
	}
}


function read_record($qry)//select query
{
	$rs=mysql_query($qry,connectinfo());	
	return $rs;	
}


?>