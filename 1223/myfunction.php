<?php
function connectinfo()
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("project",$con);	
	return $con;
}
function executequery($qry)
{
	$status="";
	$rs=mysql_query($qry,connectinfo());
	if(!$rs)
	{
		$status="Error is ".mysql_error();
	}
	else
	{
		$status="success";
	}	
	return $status;
}

function readrecord($qry) //select query only
{
	$rs=mysql_query($qry,connectinfo());
	return $rs;
}
function gettable($qry)
{
	$data="";
	$rs=readrecord($qry);		
		if(mysql_num_rows($rs)>0)
		{
			$data="<table border='1' >";
			$count=mysql_num_fields($rs);			
			$data.="<tr>";
			for($p=0;$p<$count;$p++)
			{
				$data.="<th>".mysql_field_name($rs,$p)."</th>";
			}
			$data.="</tr>";			
			while($row=mysql_fetch_array($rs))
			{
				$data.="<tr>";
				for($p=0;$p<$count;$p++)
				{
					$data.="<td>$row[$p]</td>";
				}
				$data.="</tr>";
			}			
			$data.="</table>";			
		}
		else
		{
			$data="<h3>Record not found</h3>";
		}		
	return $data;
}
?>