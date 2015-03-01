<?php
defined("true-access") or die("Access denied!");


function getDetails($courseNo)
{
	$details = array();
	list($dbc,$error) = connect_to_database();
	if ($dbc)
	{
		$query = "SELECT courseNo,description,creditHours FROM course WHERE courseNo=$courseNo ;";
		
		
		$result = mysqli_query($dbc,$query);
		if ($result)
		{
			while ($detail = mysqli_fetch_array($result))
			{
				$details[] = $detail;
			}
		}
	}
	return $details;
}
?>